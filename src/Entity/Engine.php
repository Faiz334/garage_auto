<?php

namespace App\Entity;

use App\Repository\EngineRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: EngineRepository::class)]
class Engine
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $energie = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getEnergie(): ?string
    {
        return $this->energie;
    }

    public function setEnergie(string $energie): static
    {
        $this->energie = $energie;

        return $this;
    }
}
