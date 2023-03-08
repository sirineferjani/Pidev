<?php

namespace App\Entity;

use App\Repository\AgenceRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: AgenceRepository::class)]
class Agence
{
    #[ORM\ManyToOne(inversedBy: 'agencesClass' )]
     private ?Activite $activites = null ;
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message:"Le nom de l'agence est obligatoire")]
    #[Assert\Regex(pattern: '/^[a-z\s]+$/i',htmlPattern: '^[a-zA-Z\s]+$',message:"Le nom de l'agence doit contenir que des lettres")]
    private ?string $Nom = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:"le nombre de participant doit est obligatoire ")]
    private ?int $nbr_participant = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:"le Devis est obligatoire ")]
    #[Assert\Positive(message:"Le devis doit être positif ")]
    private ?int $Devis = null;

    #[ORM\Column]
    #[Assert\NotBlank(message:"le numéro de téléphone est obligatoire ")]
    #[Assert\Length(
        min: 8,
        max: 8,
        minMessage: "Numero de téléphone invalide",
        maxMessage: "Numero de téléphone invalide"
    )]
    private ?int $Num_tel = null;

    #[ORM\ManyToOne(inversedBy: 'Agences')]
    #[ORM\JoinColumn(nullable: false)]
    private ?Activite $activite = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->Nom;
    }

    public function setNom(string $Nom): self
    {
        $this->Nom = $Nom;

        return $this;
    }

    public function getNbrParticipant(): ?int
    {
        return $this->nbr_participant;
    }

    public function setNbrParticipant(int $nbr_participant): self
    {
        $this->nbr_participant = $nbr_participant;

        return $this;
    }

    public function getDevis(): ?int
    {
        return $this->Devis;
    }

    public function setDevis(int $Devis): self
    {
        $this->Devis = $Devis;

        return $this;
    }

    public function getNumTel(): ?int
    {
        return $this->Num_tel;
    }

    public function setNumTel(int $Num_tel): self
    {
        $this->Num_tel = $Num_tel;

        return $this;
    }

    public function getActivite(): ?Activite
    {
        return $this->activite;
    }

    public function setActivite(?Activite $activite): self
    {
        $this->activite = $activite;

        return $this;
    }
}
