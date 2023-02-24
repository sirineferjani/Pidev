<?php

namespace App\Entity;


use App\Repository\EvenementRepository;
use Doctrine\ORM\Mapping as ORM;
use Doctrine\DBAL\Types\Types;
use Symfony\Component\Validator\Constraints as Assert;
#[ORM\Entity(repositoryClass: EvenementRepository::class)]
class Evenement
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    /**
    *@Assert\NotBlank(message="Le nom d'evenement doit etre non vide")
    *@Assert\Length(
    * min = 4,
    * max = 10,
    * minMessage="evenement doit etre  >=4",
    * maxMessage="evenement doit etre <=15"
    *   ) 
    */

    private ?string $nomevenement = null;

    #[ORM\Column(length: 255)]
    /**
    *@Assert\NotBlank(message="Le nom d'evenement doit etre non vide")
    *@Assert\Length(
    * min = 4,
    * max = 10,
    * minMessage="evenement doit etre  >=4",
    * maxMessage="evenement doit etre <=15"
    *   ) 
    */
    private ?string $typeevenement = null;

    #[ORM\Column(type: Types::DATETIME_MUTABLE)]
    
    private ?\DateTimeInterface $dateevenement = null;

    #[ORM\Column(type: Types::TEXT)]
    /**
    *@Assert\NotBlank(message="Le nom d'evenement doit etre non vide")
    *@Assert\Length(
    * min = 4,
    * max = 10,
    * minMessage="evenement doit etre  >=4",
    * maxMessage="evenement doit etre <=15"
    *   ) 
    */
    private ?string $description = null;

    

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNomevenement(): ?string
    {
        return $this->nomevenement;
    }

    public function setNomevenement(string $nomevenement): self
    {
        $this->nomevenement = $nomevenement;

        return $this;
    }

    public function getTypeevenement(): ?string
    {
        return $this->typeevenement;
    }

    public function setTypeevenement(string $typeevenement): self
    {
        $this->typeevenement = $typeevenement;

        return $this;
    }

    public function getDateevenement(): ?\DateTimeInterface
    {
        return $this->dateevenement;
    }

    public function setDateevenement(\DateTimeInterface $dateevenement): self
    {
        $this->dateevenement = $dateevenement;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): self
    {
        $this->description = $description;

        return $this;
    }
}
