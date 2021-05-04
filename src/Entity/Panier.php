<?php

namespace App\Entity;

use App\Repository\PanierRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=PanierRepository::class)
 */
class Panier
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="datetime")
     */
    private $dateachat;

    /**
     * @ORM\Column(type="decimal", precision=10, scale=2, nullable=true)
     */
    private $prix;
    /**
     * @ORM\ManyToOne(targetEntity=User::class, inversedBy="paniers")
     * @ORM\JoinColumn(nullable=false)
     */
    private $id_user;

    /**
     * @ORM\OneToMany(targetEntity=LigneDuPagnier::class, mappedBy="id_panier")
     */
    private $ligneDuPagniers;


    public function __construct()
    {
        $this->ligneDuPagniers = new ArrayCollection();
    }


    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateachat(): ?\DateTimeInterface
    {
        return $this->dateachat;
    }

    public function setDateachat(\DateTimeInterface $dateachat): self
    {
        $this->dateachat = $dateachat;

        return $this;
    }

    public function getPrix(): ?string
    {
        return $this->prix;
    }

    public function setPrix(?string $prix): self
    {
        $this->prix = $prix;

        return $this;
    }


    public function getIdUser(): ?user
    {
        return $this->id_user;
    }

    public function setIdUser(?user $id_user): self
    {
        $this->id_user = $id_user;

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
            $ligneDuPagnier->setIdPanier($this);
        }

        return $this;
    }

    public function removeLigneDuPagnier(LigneDuPagnier $ligneDuPagnier): self
    {
        if ($this->ligneDuPagniers->removeElement($ligneDuPagnier)) {
            // set the owning side to null (unless already changed)
            if ($ligneDuPagnier->getIdPanier() === $this) {
                $ligneDuPagnier->setIdPanier(null);
            }
        }

        return $this;
    }


}
