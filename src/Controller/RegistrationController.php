<?php

namespace App\Controller;

use App\Entity\User;
use App\Entity\UserSettings;
use App\Form\RegistrationFormType;
use SymfonyCasts\Bundle\VerifyEmail\VerifyEmailHelperInterface;
use App\Security\EmailVerifier;
use App\Security\LoginFormAuthenticator;
use Symfony\Bridge\Twig\Mime\TemplatedEmail;
use Symfony\Component\Mailer\MailerInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Mime\Address;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\Security\Core\Encoder\UserPasswordEncoderInterface;
use Symfony\Component\Security\Guard\GuardAuthenticatorHandler;
use SymfonyCasts\Bundle\VerifyEmail\Exception\VerifyEmailExceptionInterface;
use Symfony\Component\Filesystem\Filesystem;

class RegistrationController extends AbstractController
{
    private $verifyEmailHelper;
    private $mailer;
    
    public function __construct(VerifyEmailHelperInterface $helper, MailerInterface $mailer)
    {
        $this->verifyEmailHelper = $helper;
        $this->mailer = $mailer;
    }

    /**
     * @Route("/register", name="app_register")
     */
    public function register(Request $request, UserPasswordEncoderInterface $passwordEncoder, GuardAuthenticatorHandler $guardHandler, LoginFormAuthenticator $authenticator): Response
    {
        $securityContext = $this->container->get('security.authorization_checker');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return new RedirectResponse('/meme');
        }

        $user = new User();
        $form = $this->createForm(RegistrationFormType::class, $user);
        $form->handleRequest($request);
        
        if ($form->isSubmitted() && $form->isValid()) {
            if ($form->get('plainPassword')->getData() != $form->get('repeatPassword')->getData()) {

            } else {
                // encode the plain password
                $user->setPassword(
                    $passwordEncoder->encodePassword(
                        $user,
                        $form->get('plainPassword')->getData()
                    )
                );

                $entityManager = $this->getDoctrine()->getManager();
                $entityManager->persist($user);
                $entityManager->flush();
                
                $userId = $user->getId();

                $userSettings = new UserSettings();
                $userSettings->setIdUser($userId);
                $userSettings->setThemeColor(1);
                $userSettings->setBgImage(1);
                $userSettings->setShowDirectories(1);
                $userSettings->setIdAccountPlan(1);
                $entityManager->persist($userSettings);
                $entityManager->flush();

               $signatureComponents = $this->verifyEmailHelper->generateSignature(
                'registration_confirmation_route',
                $user->getId(),
                $user->getEmail()
                );
            
                return $guardHandler->authenticateUserAndHandleSuccess(
                    $user,
                    $request,
                    $authenticator,
                    'main' // firewall name in security.yaml
                );
            }
        }

        return $this->render('registration/register.html.twig', [
            'registrationForm' => $form->createView(),
            'brand' => 'MemeCloud',
            'pageName' => 'Register',
        ]);
    }

    /**
     * @Route("/verify", name="registration_confirmation_route")
     */
    public function verifyUserEmail(Request $request): Response
    {
        $this->denyAccessUnlessGranted('IS_AUTHENTICATED_FULLY');
        $user = $this->getUser();

        // Do not get the User's Id or Email Address from the Request object
        try {
            $this->helper->validateEmailConfirmation($request->getUri(), $user->getId(), $user->getEmail());
        } catch (VerifyEmailExceptionInterface $e) {
            $this->addFlash('verify_email_error', $e->getReason());

            return $this->redirectToRoute('app_register');
        }

        // Mark your user as verified. e.g. switch a User::verified property to true

        $this->addFlash('success', 'Your e-mail address has been verified.');

        return $this->redirectToRoute('app_home');
    }
}
