<?php

namespace App\Entity;

use App\Repository\BulletinPrescriptionsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BulletinPrescriptionsRepository::class)
 */
class BulletinPrescriptions
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\ManyToMany(targetEntity=OcProduits::class, inversedBy="bulletinPrescriptions")
     */
    private $prdouit;

    /**
     * @ORM\ManyToOne(targetEntity=OcConsultation::class, inversedBy="bulletinPrescriptions")
     */
    private $consultation;

    /**
     * @ORM\Column(type="date")
     */
    private $datePrescription;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $posologie;

    public function __construct()
    {
        $this->prdouit = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * @return Collection<int, OcProduits>
     */
    public function getPrdouit(): Collection
    {
        return $this->prdouit;
    }

    public function addPrdouit(OcProduits $prdouit): self
    {
        if (!$this->prdouit->contains($prdouit)) {
            $this->prdouit[] = $prdouit;
        }

        return $this;
    }

    public function removePrdouit(OcProduits $prdouit): self
    {
        $this->prdouit->removeElement($prdouit);

        return $this;
    }

    public function getConsultation(): ?OcConsultation
    {
        return $this->consultation;
    }

    public function setConsultation(?OcConsultation $consultation): self
    {
        $this->consultation = $consultation;

        return $this;
    }

    public function getDatePrescription(): ?\DateTimeInterface
    {
        return $this->datePrescription;
    }

    public function setDatePrescription(\DateTimeInterface $datePrescription): self
    {
        $this->datePrescription = $datePrescription;

        return $this;
    }

    public function getPosologie(): ?string
    {
        return $this->posologie;
    }

    public function setPosologie(?string $posologie): self
    {
        $this->posologie = $posologie;

        return $this;
    }
}
