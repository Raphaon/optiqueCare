<?php

namespace App\Entity;

use App\Repository\OcPrescripteurFonctionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OcPrescripteurFonctionsRepository::class)
 */
class OcPrescripteurFonctions
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $codeFonction;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $libelleFonction;

    /**
     * @ORM\OneToMany(targetEntity=OcPrescripteurs::class, mappedBy="fonctionPrescription")
     */
    private $prescripteurs;

    public function __construct()
    {
        $this->prescripteurs = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeFonction(): ?string
    {
        return $this->codeFonction;
    }

    public function setCodeFonction(?string $codeFonction): self
    {
        $this->codeFonction = $codeFonction;

        return $this;
    }

    public function getLibelleFonction(): ?string
    {
        return $this->libelleFonction;
    }

    public function setLibelleFonction(string $libelleFonction): self
    {
        $this->libelleFonction = $libelleFonction;

        return $this;
    }

    /**
     * @return Collection<int, OcPrescripteurs>
     */
    public function getPrescripteurs(): Collection
    {
        return $this->prescripteurs;
    }

    public function addPrescripteur(OcPrescripteurs $prescripteur): self
    {
        if (!$this->prescripteurs->contains($prescripteur)) {
            $this->prescripteurs[] = $prescripteur;
            $prescripteur->setFonctionPrescription($this);
        }

        return $this;
    }

    public function removePrescripteur(OcPrescripteurs $prescripteur): self
    {
        if ($this->prescripteurs->removeElement($prescripteur)) {
            // set the owning side to null (unless already changed)
            if ($prescripteur->getFonctionPrescription() === $this) {
                $prescripteur->setFonctionPrescription(null);
            }
        }

        return $this;
    }
}
