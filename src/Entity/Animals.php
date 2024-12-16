<?php

namespace App\Entity;

use App\Repository\AnimalsRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: AnimalsRepository::class)]
class Animals
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $name = null;

    #[ORM\Column(length: 255)]
    private ?string $picture = null;

    #[ORM\Column]
    private ?bool $dangerous = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Family $family = null;

    // #[ORM\ManyToOne(inversedBy: 'animals')]
    // #[ORM\JoinColumn(nullable: false)]
    // private ?Mainlands $mainlands = null;

    #[ORM\ManyToOne(inversedBy: 'animals')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Zoos $zoos = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(string $picture): static
    {
        $this->picture = $picture;

        return $this;
    }

    public function isDangerous(): ?bool
    {
        return $this->dangerous;
    }

    public function setDangerous(bool $dangerous): static
    {
        $this->dangerous = $dangerous;

        return $this;
    }

    public function getFamily(): ?Family
    {
        return $this->family;
    }

    public function setFamily(?Family $family): static
    {
        $this->family = $family;

        return $this;
    }

    // public function getMainlands(): ?Mainlands
    // {
    //     return $this->mainlands;
    // }

    // public function setMainlands(?Mainlands $mainlands): static
    // {
    //     $this->mainlands = $mainlands;

    //     return $this;
    // }

    public function getZoos(): ?Zoos
    {
        return $this->zoos;
    }

    public function setZoos(?Zoos $zoos): static
    {
        $this->zoos = $zoos;

        return $this;
    }
}
