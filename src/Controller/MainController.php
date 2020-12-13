<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\RedirectResponse;

class MainController extends AbstractController
{
    /**
     * @Route("/", name="main")
     */
    public function index() {
        return $this->render('main/index.html.twig', [
            'message' => 'Your place on the internet where you can store all your memes.',
            'pageName' => 'Home',
            'brand' => 'MemeCloud',
        ]);
    }
}
