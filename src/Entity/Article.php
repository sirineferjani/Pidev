<?php

namespace App\Entity;

use App\Repository\ArticleRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ArticleRepository::class)]
class Article
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    #[Groups("article")]
    private ?int $id = null;

    #[Assert\NotBlank(message:"La référence de l'article est obligatoire")]
    #[ORM\Column]
    #[Groups("article")]
    private ?int $ref_article = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"Le nom de l'article est obligatoire")]
    #[Assert\Regex(pattern: '/^[a-z\s]+$/i',htmlPattern: '^[a-zA-Z\s]+$',message:"Le nom de l'article doit contenir que des lettres")]
    #[Groups("article")]
    private ?string $Nom_article = nULL;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:"La description de l'article est obligatoire")]
    #[Assert\Length(min:10,minMessage:"La description de l'article doit comporter au moins {{ limit }} caractéres")]
    #[Groups("article")]
    private ?string $Description = null;

    #[ORM\Column]
    #[Groups("article")]
    #[Assert\NotBlank(message:"Il faut entrer le prix")]
    #[Assert\Positive(message:"Le prix doit être positif")]
    private ?float $Prix = null;

    #[ORM\Column(length: 255)]
    #[Groups("article")]
    private ?string $Image = null;
    #[Assert\NotBlank(message:"Il faut entrer le nombre de stock")]
    #[Assert\Positive(message:"Le nombre de stock doit être positif")]
    #[ORM\Column(nullable: true)]
    #[Groups("article")]
    private ?int $Stock = null;

    #[ORM\ManyToOne(inversedBy: 'articles')]
    private ?Categorie $categories = null;



    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefArticle(): ?int
    {
        return $this->ref_article;
    }

    public function setRefArticle(int $ref_article): self
    {
        $this->ref_article = $ref_article;

        return $this;
    }

    public function getNomArticle(): ?string
    {
        return $this->Nom_article;
    }

    public function setNomArticle(string $Nom_article): self
    {
        $this->Nom_article = $Nom_article;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->Description;
    }

    public function setDescription(string $Description): self
    {
        $this->Description = $Description;

        return $this;
    }

    public function getPrix(): ?float
    {
        return $this->Prix;
    }

    public function setPrix(float $Prix): self
    {
        $this->Prix = $Prix;

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->Image;
    }

    public function setImage(string $Image): self
    {
        $this->Image = $Image;

        return $this;
    }

    public function getStock(): ?int
    {
        return $this->Stock;
    }

    public function setStock(?int $Stock): self
    {
        $this->Stock = $Stock;

        return $this;
    }

    public function getCategories(): ?Categorie
    {
        return $this->categories;
    }

    public function setCategories(?Categorie $categories): self
    {
        $this->categories = $categories;

        return $this;
    }

    public function outofstock():bool
    {
        return $this->getStock()==0;
    }

 
}
