<?php

namespace App\Entity;

use App\Repository\OcPatientParametersRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OcPatientParametersRepository::class)
 */
class OcPatientParameters
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $aog;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $aod;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $aodg;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $poid;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $taille;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $ddr;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $poue;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $tabg;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $tabd;

    /**
     * @ORM\Column(type="string", length=10, nullable=true)
     */
    private $p;

    /**
     * @ORM\ManyToOne(targetEntity=OcPatients::class, inversedBy="parameters")
     */
    private $patient;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getAog(): ?string
    {
        return $this->aog;
    }

    public function setAog(?string $aog): self
    {
        $this->aog = $aog;

        return $this;
    }

    public function getAod(): ?string
    {
        return $this->aod;
    }

    public function setAod(?string $aod): self
    {
        $this->aod = $aod;

        return $this;
    }

    public function getAodg(): ?string
    {
        return $this->aodg;
    }

    public function setAodg(?string $aodg): self
    {
        $this->aodg = $aodg;

        return $this;
    }

    public function getPoid(): ?float
    {
        return $this->poid;
    }

    public function setPoid(?float $poid): self
    {
        $this->poid = $poid;

        return $this;
    }

    public function getTaille(): ?float
    {
        return $this->taille;
    }

    public function setTaille(?float $taille): self
    {
        $this->taille = $taille;

        return $this;
    }

    public function getDdr(): ?\DateTimeInterface
    {
        return $this->ddr;
    }

    public function setDdr(?\DateTimeInterface $ddr): self
    {
        $this->ddr = $ddr;

        return $this;
    }

    public function getPoue(): ?string
    {
        return $this->poue;
    }

    public function setPoue(?string $poue): self
    {
        $this->poue = $poue;

        return $this;
    }

    public function getTabg(): ?float
    {
        return $this->tabg;
    }

    public function setTabg(?float $tabg): self
    {
        $this->tabg = $tabg;

        return $this;
    }

    public function getTabd(): ?float
    {
        return $this->tabd;
    }

    public function setTabd(?float $tabd): self
    {
        $this->tabd = $tabd;

        return $this;
    }

    public function getP(): ?string
    {
        return $this->p;
    }

    public function setP(?string $p): self
    {
        $this->p = $p;

        return $this;
    }

    public function getPatient(): ?OcPatients
    {
        return $this->patient;
    }

    public function setPatient(?OcPatients $patient): self
    {
        $this->patient = $patient;

        return $this;
    }
}
