<?php

namespace App\Entity;

use App\Repository\OcTypeProduitRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OcTypeProduitRepository::class)
 */
class OcTypeProduit
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $codeType;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $typeName;

    /**
     * @ORM\OneToMany(targetEntity=OcProduits::class, mappedBy="typeProd")
     */
    private $produits;

    public function __construct()
    {
        $this->produits = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeType(): ?string
    {
        return $this->codeType;
    }

    public function setCodeType(string $codeType): self
    {
        $this->codeType = $codeType;

        return $this;
    }

    public function getTypeName(): ?string
    {
        return $this->typeName;
    }

    public function setTypeName(string $typeName): self
    {
        $this->typeName = $typeName;

        return $this;
    }

    /**
     * @return Collection<int, OcProduits>
     */
    public function getProduits(): Collection
    {
        return $this->produits;
    }

    public function addProduit(OcProduits $produit): self
    {
        if (!$this->produits->contains($produit)) {
            $this->produits[] = $produit;
            $produit->setTypeProd($this);
        }

        return $this;
    }

    public function removeProduit(OcProduits $produit): self
    {
        if ($this->produits->removeElement($produit)) {
            // set the owning side to null (unless already changed)
            if ($produit->getTypeProd() === $this) {
                $produit->setTypeProd(null);
            }
        }

        return $this;
    }
}
