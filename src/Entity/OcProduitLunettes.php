<?php

namespace App\Entity;

use App\Repository\OcProduitLunettesRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OcProduitLunettesRepository::class)
 */
class OcProduitLunettes
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\OneToOne(targetEntity=OcProduits::class, cascade={"persist", "remove"})
     */
    private $refProduit;

    /**
     * @ORM\Column(type="string", length=100, nullable=true)
     */
    private $modeleVerre;

    /**
     * @ORM\Column(type="string", length=5, nullable=true)
     */
    private $grandeurVerre;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $sphereR;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $cylindreR;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $axeR;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $addR;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $pdR;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $visusR;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $sphereL;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $cylindreL;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $axeL;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $addL;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $pdL;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $grandeurL;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $visusL;

    public function getId(): ?int
    {
        return $this->id;
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

    public function getModeleVerre(): ?string
    {
        return $this->modeleVerre;
    }

    public function setModeleVerre(?string $modeleVerre): self
    {
        $this->modeleVerre = $modeleVerre;

        return $this;
    }

    public function getGrandeurVerre(): ?string
    {
        return $this->grandeurVerre;
    }

    public function setGrandeurVerre(?string $grandeurVerre): self
    {
        $this->grandeurVerre = $grandeurVerre;

        return $this;
    }

    public function getSphereR(): ?float
    {
        return $this->sphereR;
    }

    public function setSphereR(?float $sphereR): self
    {
        $this->sphereR = $sphereR;

        return $this;
    }

    public function getCylindreR(): ?float
    {
        return $this->cylindreR;
    }

    public function setCylindreR(?float $cylindreR): self
    {
        $this->cylindreR = $cylindreR;

        return $this;
    }

    public function getAxeR(): ?float
    {
        return $this->axeR;
    }

    public function setAxeR(?float $axeR): self
    {
        $this->axeR = $axeR;

        return $this;
    }

    public function getAddR(): ?float
    {
        return $this->addR;
    }

    public function setAddR(?float $addR): self
    {
        $this->addR = $addR;

        return $this;
    }

    public function getPdR(): ?float
    {
        return $this->pdR;
    }

    public function setPdR(?float $pdR): self
    {
        $this->pdR = $pdR;

        return $this;
    }

    public function getVisusR(): ?string
    {
        return $this->visusR;
    }

    public function setVisusR(?string $visusR): self
    {
        $this->visusR = $visusR;

        return $this;
    }

    public function getSphereL(): ?float
    {
        return $this->sphereL;
    }

    public function setSphereL(?float $sphereL): self
    {
        $this->sphereL = $sphereL;

        return $this;
    }

    public function getCylindreL(): ?float
    {
        return $this->cylindreL;
    }

    public function setCylindreL(?float $cylindreL): self
    {
        $this->cylindreL = $cylindreL;

        return $this;
    }

    public function getAxeL(): ?float
    {
        return $this->axeL;
    }

    public function setAxeL(?float $axeL): self
    {
        $this->axeL = $axeL;

        return $this;
    }

    public function getAddL(): ?float
    {
        return $this->addL;
    }

    public function setAddL(?float $addL): self
    {
        $this->addL = $addL;

        return $this;
    }

    public function getPdL(): ?float
    {
        return $this->pdL;
    }

    public function setPdL(?float $pdL): self
    {
        $this->pdL = $pdL;

        return $this;
    }

    public function getGrandeurL(): ?float
    {
        return $this->grandeurL;
    }

    public function setGrandeurL(?float $grandeurL): self
    {
        $this->grandeurL = $grandeurL;

        return $this;
    }

    public function getVisusL(): ?string
    {
        return $this->visusL;
    }

    public function setVisusL(?string $visusL): self
    {
        $this->visusL = $visusL;

        return $this;
    }
}
