<?php

namespace App\Entity;

use App\Repository\LocalizationRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LocalizationRepository::class)
 */
class Localization
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_user;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $id_parent;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $directory_name;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdUser(): ?int
    {
        return $this->id_user;
    }

    public function setIdUser(int $id_user): self
    {
        $this->id_user = $id_user;

        return $this;
    }

    public function getIdParent(): ?int
    {
        return $this->id_parent;
    }

    public function setIdParent(?int $id_parent): self
    {
        $this->id_parent = $id_parent;

        return $this;
    }

    public function getDirectoryName(): ?string
    {
        return $this->directory_name;
    }

    public function setDirectoryName(string $directory_name): self
    {
        $this->directory_name = $directory_name;

        return $this;
    }
}
