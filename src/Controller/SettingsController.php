<?php

namespace App\Controller;

use App\Entity\ColorPalette;
use App\Entity\BackgroundImage;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\Routing\Annotation\Route;

class SettingsController extends AbstractController
{
    /**
     * @Route("/settings/themes", name="settings_themes")
     */
    public function themesSettings()
    {   
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
            'pageName' => 'Settings',
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
        return $this->render('settings/templates/meme_panel_settings.html.twig', [
            'pageName' => 'Settings',
            'brand' => 'MemeCloud',
        ]);
    }

    /**
     * @Route("/settings/account", name="settings_account")
     */
    public function accountSettings()
    {
        return $this->render('settings/templates/account_settings.html.twig', [
            'pageName' => 'Settings',
            'brand' => 'MemeCloud',
        ]);
    }

    /**
     * @Route("/settings/access", name="settings_access")
     */
    public function accessSettings()
    {
        return $this->render('settings/templates/access_settings.html.twig', [
            'pageName' => 'Settings',
            'brand' => 'MemeCloud',
        ]);
    }

    /**
     * @Route("/settings/pro", name="settings_pro")
     */
    public function memecloudProSettings()
    {
        return $this->render('settings/templates/pro_settings.html.twig', [
            'pageName' => 'Settings',
            'brand' => 'MemeCloud',
        ]);
    }

    private function dbColorPaletteClass() {
        return $this->getDoctrine()->getRepository(ColorPalette::class);
    }

    private function dbBackgroundImageClass() {
        return $this->getDoctrine()->getRepository(BackgroundImage::class);
    }
}
