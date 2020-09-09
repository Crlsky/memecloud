<?php

namespace App\Entity;

use App\Repository\ColorPaletteRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ColorPaletteRepository::class)
 */
class ColorPalette
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $colors;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getColors(): ?string
    {
        return $this->colors;
    }

    public function setColors(?string $colors): self
    {
        $this->colors = $colors;

        return $this;
    }
}
