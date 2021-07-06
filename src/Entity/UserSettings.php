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

    /**
     * @ORM\Column(type="integer")
     */
    private $id_account_plan;

    /**
     * @ORM\Column(name="show_memes_nametags", type="integer", options={"default" : 1})
     */
    private $show_memes_nametags;

    /**
     * @ORM\Column(name="show_hidden_directories", type="integer", options={"default" : 0})
     */
    private $show_hidden_directories;

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

    public function getIdAccountPlan(): ?int
    {
        return $this->id_account_plan;
    }

    public function setIdAccountPlan(?int $id_account_plan): self
    {
        $this->id_account_plan = $id_account_plan;

        return $this;
    }

    public function getShowMemesNametags(): ?int
    {
        return $this->show_memes_nametags;
    }

    public function setShowMemesNametags(?int $show_memes_nametags): self
    {
        $this->show_memes_nametags = $show_memes_nametags;

        return $this;
    }

    public function getShowHiddenDirectories(): ?int
    {
        return $this->show_hidden_directories;
    }

    public function setShowHiddenDirectories(?int $show_hidden_directories): self
    {
        $this->show_hidden_directories = $show_hidden_directories;

        return $this;
    }
}
