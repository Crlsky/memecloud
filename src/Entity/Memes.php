<?php

namespace App\Entity;

use App\Repository\MemesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=MemesRepository::class)
 */
class Memes
{
    /**
     * @ORM\Id()
     * @ORM\GeneratedValue()
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $meme_name;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $meme_checksum;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $id_directory;

    /**
     * @ORM\Column(type="integer")
     */
    private $id_user;

    /**
     * @ORM\Column(type="integer")
     */
    private $doubled;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMemeName(): ?string
    {
        return $this->meme_name;
    }

    public function setMemeName(string $meme_name): self
    {
        $this->meme_name = $meme_name;

        return $this;
    }

    public function getMemeChecksum(): ?string
    {
        return $this->meme_checksum;
    }

    public function setMemeChecksum(string $meme_checksum): self
    {
        $this->meme_checksum = $meme_checksum;

        return $this;
    }

    public function getIdDirectory(): ?int
    {
        return $this->id_directory;
    }

    public function setIdDirectory(?int $id_directory): self
    {
        $this->id_directory = $id_directory;

        return $this;
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

    public function getDoubled(): ?int
    {
        return $this->doubled;
    }

    public function setDoubled(int $doubled): self
    {
        $this->doubled = $doubled;

        return $this;
    }
}
