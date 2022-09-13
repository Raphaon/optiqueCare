<?php

namespace App\Entity;

use App\Repository\BulletinExamensRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=BulletinExamensRepository::class)
 */
class BulletinExamens
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
    private $refBulletinExamen;

    /**
     * @ORM\ManyToMany(targetEntity=OcExamens::class, inversedBy="bulletinExamens")
     */
    private $examen;

    /**
     * @ORM\ManyToOne(targetEntity=OcConsultation::class, inversedBy="bulletinExamens")
     */
    private $consultation;

    /**
     * @ORM\Column(type="date")
     */
    private $datePrescription;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $observation;

    public function __construct()
    {
        $this->examen = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefBulletinExamen(): ?string
    {
        return $this->refBulletinExamen;
    }

    public function setRefBulletinExamen(string $refBulletinExamen): self
    {
        $this->refBulletinExamen = $refBulletinExamen;

        return $this;
    }

    /**
     * @return Collection<int, OcExamens>
     */
    public function getExamen(): Collection
    {
        return $this->examen;
    }

    public function addExaman(OcExamens $examan): self
    {
        if (!$this->examen->contains($examan)) {
            $this->examen[] = $examan;
        }

        return $this;
    }

    public function removeExaman(OcExamens $examan): self
    {
        $this->examen->removeElement($examan);

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

    public function getObservation(): ?string
    {
        return $this->observation;
    }

    public function setObservation(?string $observation): self
    {
        $this->observation = $observation;

        return $this;
    }
}
