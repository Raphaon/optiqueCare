<?php

namespace App\Entity;

use App\Repository\OcProduitsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OcProduitsRepository::class)
 */
class OcProduits
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
    private $refProd;

    /**
     * @ORM\ManyToOne(targetEntity=OcTypeProduit::class, inversedBy="produits")
     */
    private $typeProd;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelleProd;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixAchat;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixVente;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $marqueProd;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $descriptionProd;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $couleursProd;

    /**
     * @ORM\ManyToMany(targetEntity=BulletinPrescriptions::class, mappedBy="prdouit")
     */
    private $bulletinPrescriptions;

    public function __construct()
    {
        $this->bulletinPrescriptions = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefProd(): ?string
    {
        return $this->refProd;
    }

    public function setRefProd(string $refProd): self
    {
        $this->refProd = $refProd;

        return $this;
    }

    public function getTypeProd(): ?OcTypeProduit
    {
        return $this->typeProd;
    }

    public function setTypeProd(?OcTypeProduit $typeProd): self
    {
        $this->typeProd = $typeProd;

        return $this;
    }

    public function getLibelleProd(): ?string
    {
        return $this->libelleProd;
    }

    public function setLibelleProd(string $libelleProd): self
    {
        $this->libelleProd = $libelleProd;

        return $this;
    }

    public function getPrixAchat(): ?float
    {
        return $this->prixAchat;
    }

    public function setPrixAchat(?float $prixAchat): self
    {
        $this->prixAchat = $prixAchat;

        return $this;
    }

    public function getPrixVente(): ?float
    {
        return $this->prixVente;
    }

    public function setPrixVente(?float $prixVente): self
    {
        $this->prixVente = $prixVente;

        return $this;
    }

    public function getMarqueProd(): ?string
    {
        return $this->marqueProd;
    }

    public function setMarqueProd(?string $marqueProd): self
    {
        $this->marqueProd = $marqueProd;

        return $this;
    }

    public function getDescriptionProd(): ?string
    {
        return $this->descriptionProd;
    }

    public function setDescriptionProd(?string $descriptionProd): self
    {
        $this->descriptionProd = $descriptionProd;

        return $this;
    }

    public function getCouleursProd(): ?string
    {
        return $this->couleursProd;
    }

    public function setCouleursProd(?string $couleursProd): self
    {
        $this->couleursProd = $couleursProd;

        return $this;
    }

    /**
     * @return Collection<int, BulletinPrescriptions>
     */
    public function getBulletinPrescriptions(): Collection
    {
        return $this->bulletinPrescriptions;
    }

    public function addBulletinPrescription(BulletinPrescriptions $bulletinPrescription): self
    {
        if (!$this->bulletinPrescriptions->contains($bulletinPrescription)) {
            $this->bulletinPrescriptions[] = $bulletinPrescription;
            $bulletinPrescription->addPrdouit($this);
        }

        return $this;
    }

    public function removeBulletinPrescription(BulletinPrescriptions $bulletinPrescription): self
    {
        if ($this->bulletinPrescriptions->removeElement($bulletinPrescription)) {
            $bulletinPrescription->removePrdouit($this);
        }

        return $this;
    }
}
