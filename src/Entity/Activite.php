<?php

namespace App\Entity;

use App\Repository\ActiviteRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\HttpFoundation\File\File;
use Vich\UploaderBundle\Mapping\Annotation as Vich;
use Vich\UploaderBundle\Form\Type\VichImageType;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ActiviteRepository::class)]

///**
 //* @Vich\Uploadable
  //*/

class Activite
  
{
    
    #[ORM\OneToMany(mappedBy: 'Activites' , targetEntity: Agence::class)]
     private Collection $activitesClass;

    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 20)]
    #[Assert\NotBlank(message:"Le nom de l'activité est obligatoire")]
    #[Assert\Regex(pattern: '/^[a-z\s]+$/i',htmlPattern: '^[a-zA-Z\s]+$',message:"Le nom de l'activité doit contenir que des lettres")]
    private ?string $nom = null;

    #[ORM\Column(length: 200)]
    #[Assert\NotBlank(message:"la description est obligatoire ")]
    private ?string $description = null;

    #[ORM\Column(length: 2)]
    #[Assert\Positive(message:"L'age doit être positif ")]
    #[Assert\Length(
        min: 1,
        max: 2,
        minMessage: "Age must be at least {{ limit }} characters long",
        maxMessage: "Age cannot be longer than {{ limit }} characters"
    )]
    private ?int $age = null;


    #[ORM\Column(length: 50)]
    #[Assert\NotBlank(message:"le lieu est obligatoire ")]
    private ?string $lieu = null;


   

     /**
     * @ORM\Column(type="string", length=255)
     * @var string
     */
    private $image;

    #[ORM\OneToMany(mappedBy: 'activite', targetEntity: Agence::class)]
    private Collection $Agences;

    public function __construct()
    {
        $this->Agences = new ArrayCollection();
    }

    ///**
    // *  @ORM
    // * @Vich\UploadableField(mapping="activite_images", fileNameProperty="image")
    // * @var File
    // */
    //private $imageFile;

   // /**
   //  * @ORM\Column(type="datetime")
   // * @var \DateTime
   //  */
   // private $updatedAt;

   

   // public function setImageFile(File $image = null)
   // {
   //     $this->imageFile = $image;

        // VERY IMPORTANT:
        // It is required that at least one field changes if you are using Doctrine,
        // otherwise the event listeners won't be called and the file is lost
     //  if ($image) {
            // if 'updatedAt' is not defined in your entity, use another property
     //      $this->updatedAt = new \DateTime('now');
     //   }
   // }

   //public function getImageFile()
   // {
  //      return $this->imageFile;
   // }

    public function setImage($image)
    {
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }


   
    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNom(): ?string
    {
        return $this->nom;
    }

    public function setNom(string $nom): self
    {
        $this->nom = $nom;

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

    public function getAge(): ?int
    {
        return $this->age;
    }

    public function setAge(int $age): self
    {
        $this->age = $age;

        return $this;
    }

    public function getLieu(): ?string
    {
        return $this->lieu;
    }

    public function setLieu(string $lieu): self
    {
        $this->lieu = $lieu;

        return $this;
    }

    /**
     * @return Collection<int, Agence>
     */
    public function getAgences(): Collection
    {
        return $this->Agences;
    }

    public function addAgence(Agence $agence): self
    {
        if (!$this->Agences->contains($agence)) {
            $this->Agences->add($agence);
            $agence->setActivite($this);
        }

        return $this;
    }

    public function removeAgence(Agence $agence): self
    {
        if ($this->Agences->removeElement($agence)) {
            // set the owning side to null (unless already changed)
            if ($agence->getActivite() === $this) {
                $agence->setActivite(null);
            }
        }

        return $this;
    }

 }