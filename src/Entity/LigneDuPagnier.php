<?php

namespace App\Entity;

use App\Repository\LigneDuPagnierRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=LigneDuPagnierRepository::class)
 */
class LigneDuPagnier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToOne(targetEntity=Panier::class, inversedBy="ligneDuPagniers")
     * @ORM\JoinColumn(nullable=true)
     */
    private $id_panier;

    /**
     * @ORM\ManyToOne(targetEntity=Produit::class, inversedBy="ligneDuPagniers")
     * @ORM\JoinColumn(nullable=true)
     */
    private $id_produit;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantiter;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     *
     */
    private $prix_unitaire;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getIdPanier(): ?panier
    {
        return $this->id_panier;
    }

    public function setIdPanier(?panier $id_panier): self
    {
        $this->id_panier = $id_panier;

        return $this;
    }

    public function getIdProduit(): ?produit
    {
        return $this->id_produit;
    }

    public function setIdProduit(?produit $id_produit): self
    {
        $this->id_produit = $id_produit;

        return $this;
    }

    public function getQuantiter(): ?int
    {
        return $this->quantiter;
    }

    public function setQuantiter(int $quantiter): self
    {
        $this->quantiter = $quantiter;

        return $this;
    }

    public function getPrixUnitaire(): ?string
    {
        return $this->prix_unitaire;
    }

    public function setPrixUnitaire(string $prix_unitaire): self
    {
        $this->prix_unitaire = $prix_unitaire;

        return $this;
    }
}
