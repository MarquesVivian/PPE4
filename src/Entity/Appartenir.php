<?php

namespace App\Entity;

use App\Repository\AppartenirRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=AppartenirRepository::class)
 */
class Appartenir
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="appartenirs")
     * @ORM\JoinColumn(nullable=true)
     */
    private $id_produit_categorie;

    /**
     * @ORM\ManyToOne(targetEntity=Categorie::class, inversedBy="appartenirs")
     * @ORM\JoinColumn(nullable=true)
     */
    private $id_categorie_produit;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdProduitCategorie(): ?produit
    {
        return $this->id_produit_categorie;
    }

    public function setIdProduitCategorie(?produit $id_produit_categorie): self
    {
        $this->id_produit_categorie = $id_produit_categorie;

        return $this;
    }

    public function getIdCategorieProduit(): ?categorie
    {
        return $this->id_categorie_produit;
    }

    public function setIdCategorieProduit(?categorie $id_categorie_produit): self
    {
        $this->id_categorie_produit = $id_categorie_produit;

        return $this;
    }
}
