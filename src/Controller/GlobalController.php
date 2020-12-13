<?php

namespace App\Controller;

use App\Entity\ColorPalette;
use App\Entity\BackgroundImage;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class GlobalController extends AbstractController {

    public function getBackgroundImg() {

        if (!$this->checkLogin()) {
            return "/IMG/user_bg_images/93c9f8cd65adfbe50594f1c8661f9aac.jpeg";
        }

        $entityManager = $this->getDoctrine()->getManager();        

        $sql = "
            SELECT a.image_src 
            FROM background_image a
            LEFT JOIN user_settings b ON b.bg_image = a.id
            WHERE b.id_user = :user_id 
        ";

        $userBackgroundImage = $entityManager->getConnection()->prepare($sql);
        $userBackgroundImage->bindValue('user_id', $this->getUser()->getId());
        $userBackgroundImage->execute();

        $result = $userBackgroundImage->fetchAll();

        foreach ($result as $bgImage) {
            $image = json_decode($bgImage['image_src']);
        }

        return $image->image_src;
    }

    private function dbUserSettings() { 
        return $this->getDoctrine()->getRepository(UserSettings::class);
    }

    private function checkLogin() {
        $securityContext = $this->container->get('security.authorization_checker');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return true;
        }
    }
}