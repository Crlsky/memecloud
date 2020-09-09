<?php

namespace App\Entity;

use App\Repository\BackgroundImageRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BackgroundImageRepository::class)
 */
class BackgroundImage
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
    private $image_src;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getImageSrc(): ?string
    {
        return $this->image_src;
    }

    public function setImageSrc(?string $image_src): self
    {
        $this->image_src = $image_src;

        return $this;
    }
}
