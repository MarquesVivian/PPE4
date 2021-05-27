<?php

namespace App\Entity;

use App\Repository\ProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ProduitRepository::class)
 */
class Produit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelle;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $desciption;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2)
     */
    private $prix;

    /**
     * @ORM\Column(type="integer")
     */
    private $quantiter;

    /**
     * @ORM\OneToMany(targetEntity=LigneDuPagnier::class, mappedBy="id_produit")
     */
    private $ligneDuPagniers;

    /**
     * @ORM\OneToMany(targetEntity=Appartenir::class, mappedBy="id_produit_categorie")
     */
    private $appartenirs;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $image;

    public function __construct()
    {
        $this->ligneDuPagniers = new ArrayCollection();
        $this->appartenirs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getLibelle(): ?string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): self
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function getDesciption(): ?string
    {
        return $this->desciption;
    }

    public function setDesciption(string $desciption): self
    {
        $this->desciption = $desciption;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(string $prix): self
    {
        $this->prix = $prix;

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

    /**
     * @return Collection|LigneDuPagnier[]
     */
    public function getLigneDuPagniers(): Collection
    {
        return $this->ligneDuPagniers;
    }

    public function addLigneDuPagnier(LigneDuPagnier $ligneDuPagnier): self
    {
        if (!$this->ligneDuPagniers->contains($ligneDuPagnier)) {
            $this->ligneDuPagniers[] = $ligneDuPagnier;
            $ligneDuPagnier->setIdProduit($this);
        }

        return $this;
    }

    public function removeLigneDuPagnier(LigneDuPagnier $ligneDuPagnier): self
    {
        if ($this->ligneDuPagniers->removeElement($ligneDuPagnier)) {
            // set the owning side to null (unless already changed)
            if ($ligneDuPagnier->getIdProduit() === $this) {
                $ligneDuPagnier->setIdProduit(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection|Appartenir[]
     */
    public function getAppartenirs(): Collection
    {
        return $this->appartenirs;
    }

    public function addAppartenir(Appartenir $appartenir): self
    {
        if (!$this->appartenirs->contains($appartenir)) {
            $this->appartenirs[] = $appartenir;
            $appartenir->setIdProduitCategorie($this);
        }

        return $this;
    }

    public function removeAppartenir(Appartenir $appartenir): self
    {
        if ($this->appartenirs->removeElement($appartenir)) {
            // set the owning side to null (unless already changed)
            if ($appartenir->getIdProduitCategorie() === $this) {
                $appartenir->setIdProduitCategorie(null);
            }
        }

        return $this;
    }

    public function getImage(): ?string
    {
        return $this->image;
    }

    public function setImage(?string $image): self
    {
        $this->image = $image;

        return $this;
    }
    
}
