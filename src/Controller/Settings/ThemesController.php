<?php

namespace App\Controller\Settings;

use App\Entity\ColorPalette;
use App\Entity\BackgroundImage;
use App\Entity\UserSettings;
use Symfony\Component\HttpFoundation\JsonResponse;
use \Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class ThemesController extends AbstractController {
    
    /**
     * @Route("/settings/themes/background_save", name="background_save_themes_settings")
     */
    function saveBackgroundImage(Request $request) {
        $settingsRequest = $request->getContent();
        $decodedJson = json_decode($settingsRequest);

        if (isset($decodedJson->saveBackgroundImage) && $decodedJson->saveBackgroundImage === true) {
            $entityManager = $this->getDoctrine()->getManager();
            
            $userSettingsDb = $this->dbUserSettings();
            $userSettings = $userSettingsDb->find($this->getUser()->getId());

            $userSettings->setBgImage($decodedJson->background_image_id);
            $entityManager->flush();
        }

        return new JsonResponse("Your background image has been changed!");
    }

    private function dbUserSettings() { 
        return $this->getDoctrine()->getRepository(UserSettings::class);
    }
}