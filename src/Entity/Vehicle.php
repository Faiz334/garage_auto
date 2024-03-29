<?php

namespace App\Entity;

use App\Repository\VehicleRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Symfony\Component\HttpFoundation\File\File;
use Symfony\Component\HttpFoundation\File\UploadedFile;


#[ORM\Entity(repositoryClass: VehicleRepository::class)]
#[Vich\Uploadable]
class Vehicle
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $titre = null;

    #[ORM\Column(type: Types::TEXT)]
    private ?string $description = null;

    #[ORM\Column]
    private ?float $prix = null;

    #[ORM\Column]
    private ?int $kilometrage = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $Date = null;

    #[ORM\ManyToOne]
    private ?Brand $marque = null;

    #[ORM\ManyToOne]
    private ?Engine $energie = null;

    #[ORM\ManyToOne]
    private ?Gearbox $boite = null;

    #[ORM\Column(nullable: true)]
    private ?string $image = null;

    #[Vich\UploadableField(mapping: 'vehicle_image', fileNameProperty: 'image')]
    private ?File $imageFile = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitre(): ?string
    {
        return $this->titre;
    }

    public function setTitre(string $titre): static
    {
        $this->titre = $titre;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->prix;
    }

    public function setPrix(float $prix): static
    {
        $this->prix = $prix;

        return $this;
    }

    public function getKilometrage(): ?int
    {
        return $this->kilometrage;
    }

    public function setKilometrage(int $kilometrage): static
    {
        $this->kilometrage = $kilometrage;

        return $this;
    }

    public function getDate(): ?\DateTimeInterface
    {
        return $this->Date;
    }

    public function setDate(\DateTimeInterface $Date): static
    {
        $this->Date = $Date;

        return $this;
    }

    public function getMarque(): ?Brand
    {
        return $this->marque;
    }

    public function setMarque(?Brand $marque): static
    {
        $this->marque = $marque;

        return $this;
    }

    public function getEnergie(): ?Engine
    {
        return $this->energie;
    }

    public function setEnergie(?Engine $energie): static
    {
        $this->energie = $energie;

        return $this;
    }

    public function getBoite(): ?Gearbox
    {
        return $this->boite;
    }

    public function setBoite(?Gearbox $boite): static
    {
        $this->boite = $boite;

        return $this;
    }
    
    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): static
    {
        $this->image = $image;

        return $this;
    }

    public function getImageFile(): ?File
    {
        return $this->imageFile;
    }

    public function setImageFile(?File $imageFile = null): static
    {
        $this->imageFile = $imageFile;

        if ($imageFile) {
            // It's important to update the asset field to trigger the file upload
            $this->updatedAt = new \DateTimeImmutable();
        }

        return $this;
    }

}
