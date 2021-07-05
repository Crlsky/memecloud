<?php

namespace App\Controller;

use App\Entity\ColorPalette;
use App\Entity\BackgroundImage;
use Symfony\Component\HttpFoundation\RedirectResponse;
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

        return $this->render('settings/templates/meme_panel_settings.html.twig', [
            'pageName' => 'Meme panel',
            'brand' => 'MemeCloud',
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

    private function dbColorPaletteClass() {
        return $this->getDoctrine()->getRepository(ColorPalette::class);
    }

    private function dbBackgroundImageClass() {
        return $this->getDoctrine()->getRepository(BackgroundImage::class);
    }

    private function checkLogin() {
        $securityContext = $this->container->get('security.authorization_checker');
        if ($securityContext->isGranted('IS_AUTHENTICATED_REMEMBERED')) {
            return true;
        }
    }
}
