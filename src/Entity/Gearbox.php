<?php

namespace App\Entity;

use App\Repository\GearboxRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: GearboxRepository::class)]
class Gearbox
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $Boite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getBoite(): ?string
    {
        return $this->Boite;
    }

    public function setBoite(string $Boite): static
    {
        $this->Boite = $Boite;

        return $this;
    }
}
