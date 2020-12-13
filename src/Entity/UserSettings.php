<?php

namespace App\Entity;

use App\Repository\UserSettingsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=UserSettingsRepository::class)
 */
class UserSettings
{
    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     */
    private $id_user;

    /**
     * @ORM\Column(type="integer")
     */
    private $theme_color;

    /**
     * @ORM\Column(type="integer")
     */
    private $bg_image;

    /**
     * @ORM\Column(type="integer")
     */
    private $show_directories;

    public function setIdUser(int $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getThemeColor(): ?int
    {
        return $this->theme_color;
    }

    public function setThemeColor(int $theme_color): self
    {
        $this->theme_color = $theme_color;

        return $this;
    }

    public function getBgImage(): ?int
    {
        return $this->bg_image;
    }

    public function setBgImage(int $bg_image): self
    {
        $this->bg_image = $bg_image;

        return $this;
    }

    public function getShowDirectories(): ?int
    {
        return $this->show_directories;
    }

    public function setShowDirectories(int $show_directories): self
    {
        $this->show_directories = $show_directories;

        return $this;
    }
}
