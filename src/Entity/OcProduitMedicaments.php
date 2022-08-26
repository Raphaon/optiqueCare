<?php

namespace App\Entity;

use App\Repository\OcProduitMedicamentsRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OcProduitMedicamentsRepository::class)
 */
class OcProduitMedicaments
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
    private $refMedoc;

    /**
     * @ORM\OneToOne(targetEntity=OcProduits::class, inversedBy="medicament", cascade={"persist", "remove"})
     */
    private $refProduit;

    /**
     * @ORM\Column(type="date")
     */
    private $dateExp;

    /**
     * @ORM\Column(type="string", length=50)
     */
    private $numLot;

    /**
     * @ORM\Column(type="date")
     */
    private $dateAchat;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefMedoc(): ?string
    {
        return $this->refMedoc;
    }

    public function setRefMedoc(string $refMedoc): self
    {
        $this->refMedoc = $refMedoc;

        return $this;
    }

    public function getRefProduit(): ?OcProduits
    {
        return $this->refProduit;
    }

    public function setRefProduit(?OcProduits $refProduit): self
    {
        $this->refProduit = $refProduit;

        return $this;
    }

    public function getDateExp(): ?\DateTimeInterface
    {
        return $this->dateExp;
    }

    public function setDateExp(\DateTimeInterface $dateExp): self
    {
        $this->dateExp = $dateExp;

        return $this;
    }

    public function getNumLot(): ?string
    {
        return $this->numLot;
    }

    public function setNumLot(string $numLot): self
    {
        $this->numLot = $numLot;

        return $this;
    }

    public function getDateAchat(): ?\DateTimeInterface
    {
        return $this->dateAchat;
    }

    public function setDateAchat(\DateTimeInterface $dateAchat): self
    {
        $this->dateAchat = $dateAchat;

        return $this;
    }
}
