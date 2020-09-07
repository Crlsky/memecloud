<?php

namespace App\Controller\API;

use App\Entity\User;
use App\Entity\Localization;
use App\Entity\Memes;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Security\Core\Authentication\Token\Storage\TokenStorageInterface;
use Symfony\Component\Security\Core\Authentication\Token\UsernamePasswordToken;

class ApiExtensionDirectoriesController extends AbstractController
{


    // connecting do Localization Entity.
    private function dbLocalizationClass() {
        return $this->getDoctrine()->getRepository(Localization::class);
    }

    // connecting do Memes Entity.
    private function dbMemesClass() {
        return $this->getDoctrine()->getRepository(Memes::class);
    }   
}
