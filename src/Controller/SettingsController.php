<?php

namespace App\Controller;

use App\Entity\ColorPalette;
use App\Entity\BackgroundImage;
use App\Entity\UserSettings;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SettingsController extends AbstractController
{
    /**
     * @Route("/settings/themes", name="settings_themes")
     */
    public function themesSettings()
    {   
        if (!$this->checkLogin()) {
            return new RedirectResponse('/login');
        }

        $colorPaletteDb = $this->dbColorPaletteClass();
        $backgroundImageDb = $this->dbBackgroundImageClass();
        $colorPaletteTable = array();
        $backgroundImageTable = array();

        $colorPalette = $colorPaletteDb->findAll();

        foreach ($colorPalette as $data) {
            $colorPaletteTable[$data->getId()] = json_decode($data->getColors());
        }
        
        $backgroundImage = $backgroundImageDb->findAll();

        foreach ($backgroundImage as $data) {
            $backgroundImageTable[$data->getId()] = json_decode($data->getImageSrc());
        }

        return $this->render('settings/templates/themes_settings.html.twig', [
            'pageName' => 'Themes',
            'brand' => 'MemeCloud',
            'colorPalette' => $colorPaletteTable,
            'backgroundImages' => $backgroundImageTable
        ]);
    }

    /**
     * @Route("/settings/meme-panel", name="settings_meme_panel")
     */
    public function memePanelSettings()
    {
        if (!$this->checkLogin()) {
            return new RedirectResponse('/login');
        }

        $settingsTab = array();

        $userSettingsDb = $this->dbUserSettingsClass();
        $userSettings = $userSettingsDb->findBy(array(
            'id_user' => $this->getUser()->getId()
        ));

        foreach ($userSettings as $settings) {
            array_push($settingsTab, array(
                'setShowMemesNametags' => [
                    'data' => $settings->getShowMemesNametags(),
                    'displayText' => "Show name tags under each meme",
                ],
                'setShowDirectories' => [
                    'data' => $settings->getShowDirectories(),
                    'displayText' => "Show directories",
                ],
                'setShowHiddenDirectories' => [
                    'data' => $settings->getShowHiddenDirectories(),
                    'displayText' => "Show hidden directories",
                ],
            ));
        }

        return $this->render('settings/templates/meme_panel_settings.html.twig', [
            'pageName' => 'Meme panel',
            'brand' => 'MemeCloud',
            'settings' => $settingsTab,
        ]);
    }

    /**
     * @Route("/settings/account", name="settings_account")
     */
    public function accountSettings()
    {
        if (!$this->checkLogin()) {
            return new RedirectResponse('/login');
        }

        return $this->render('settings/templates/account_settings.html.twig', [
            'pageName' => 'Account',
            'brand' => 'MemeCloud',
        ]);
    }

    /**
     * @Route("/settings/access", name="settings_access")
     */
    public function accessSettings()
    {
        if (!$this->checkLogin()) {
            return new RedirectResponse('/login');
        }

        return $this->render('settings/templates/access_settings.html.twig', [
            'pageName' => 'Access',
            'brand' => 'MemeCloud',
        ]);
    }

    /**
     * @Route("/settings/pro", name="settings_pro")
     */
    public function memecloudProSettings()
    {
        if (!$this->checkLogin()) {
            return new RedirectResponse('/login');
        }

        return $this->render('settings/templates/pro_settings.html.twig', [
            'pageName' => 'Premium',
            'brand' => 'MemeCloud',
        ]);
    }

    /**
     * @Route("/settings/save", name="settings_save")
     */
    public function saveOptions(Request $request) {
        $clientName = $request->getContent();
        $decodedJson = json_decode($clientName);
        $userSettingsDb = $this->dbUserSettingsClass();
        $userSettings = $userSettingsDb->findOneBy([
            'id_user' => $this->getUser()->getId()
        ]);

        $functionName = $decodedJson->parameter;

        if ($decodedJson->option === true) {
            $userSettings->$functionName(1);
        } else {
            $userSettings->$functionName(0);
        }

        $this->getDoctrine()->getManager()->persist($userSettings);
        $this->getDoctrine()->getManager()->flush();

        return new JsonResponse("Done");
    }

    private function dbColorPaletteClass() {
        return $this->getDoctrine()->getRepository(ColorPalette::class);
    }

    private function dbBackgroundImageClass() {
        return $this->getDoctrine()->getRepository(BackgroundImage::class);
    }

    private function dbUserSettingsClass() {
        return $this->getDoctrine()->getRepository(UserSettings::class);
    }

    private function checkLogin() {
        $securityContext = $this->container->get('security.authorization_checker');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return true;
        }
    }
}
