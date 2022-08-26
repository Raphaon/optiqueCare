<?php

namespace App\Entity;

use App\Repository\OcConsultationRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OcConsultationRepository::class)
 */
class OcConsultation
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="date")
     */
    private $dateConsultation;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $histoireMaladie;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $plaintes;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $antecedantsPatient;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $antecedantsFamiliaux;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $diagnosticPatient;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $bilanConsultation;

    /**
     * @ORM\ManyToOne(targetEntity=OcPatients::class, inversedBy="consultations")
     */
    private $patient;

    /**
     * @ORM\ManyToOne(targetEntity=OcPrescripteurs::class, inversedBy="consultations")
     */
    private $prescripteur;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateProchainRdv;

    /**
     * @ORM\OneToMany(targetEntity=BulletinPrescriptions::class, mappedBy="consultation")
     */
    private $bulletinPrescriptions;

    /**
     * @ORM\OneToMany(targetEntity=BulletinExamens::class, mappedBy="consultation")
     */
    private $bulletinExamens;

    public function __construct()
    {
        $this->bulletinPrescriptions = new ArrayCollection();
        $this->bulletinExamens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDateConsultation(): ?\DateTimeInterface
    {
        return $this->dateConsultation;
    }

    public function setDateConsultation(\DateTimeInterface $dateConsultation): self
    {
        $this->dateConsultation = $dateConsultation;

        return $this;
    }

    public function getHistoireMaladie(): ?string
    {
        return $this->histoireMaladie;
    }

    public function setHistoireMaladie(?string $histoireMaladie): self
    {
        $this->histoireMaladie = $histoireMaladie;

        return $this;
    }

    public function getPlaintes(): ?string
    {
        return $this->plaintes;
    }

    public function setPlaintes(?string $plaintes): self
    {
        $this->plaintes = $plaintes;

        return $this;
    }

    public function getAntecedantsPatient(): ?string
    {
        return $this->antecedantsPatient;
    }

    public function setAntecedantsPatient(?string $antecedantsPatient): self
    {
        $this->antecedantsPatient = $antecedantsPatient;

        return $this;
    }

    public function getAntecedantsFamiliaux(): ?string
    {
        return $this->antecedantsFamiliaux;
    }

    public function setAntecedantsFamiliaux(?string $antecedantsFamiliaux): self
    {
        $this->antecedantsFamiliaux = $antecedantsFamiliaux;

        return $this;
    }

    public function getDiagnosticPatient(): ?string
    {
        return $this->diagnosticPatient;
    }

    public function setDiagnosticPatient(?string $diagnosticPatient): self
    {
        $this->diagnosticPatient = $diagnosticPatient;

        return $this;
    }

    public function getBilanConsultation(): ?string
    {
        return $this->bilanConsultation;
    }

    public function setBilanConsultation(?string $bilanConsultation): self
    {
        $this->bilanConsultation = $bilanConsultation;

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

    public function getPrescripteur(): ?OcPrescripteurs
    {
        return $this->prescripteur;
    }

    public function setPrescripteur(?OcPrescripteurs $prescripteur): self
    {
        $this->prescripteur = $prescripteur;

        return $this;
    }

    public function getDateProchainRdv(): ?\DateTimeInterface
    {
        return $this->dateProchainRdv;
    }

    public function setDateProchainRdv(?\DateTimeInterface $dateProchainRdv): self
    {
        $this->dateProchainRdv = $dateProchainRdv;

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
            $bulletinPrescription->setConsultation($this);
        }

        return $this;
    }

    public function removeBulletinPrescription(BulletinPrescriptions $bulletinPrescription): self
    {
        if ($this->bulletinPrescriptions->removeElement($bulletinPrescription)) {
            // set the owning side to null (unless already changed)
            if ($bulletinPrescription->getConsultation() === $this) {
                $bulletinPrescription->setConsultation(null);
            }
        }

        return $this;
    }

    /**
     * @return Collection<int, BulletinExamens>
     */
    public function getBulletinExamens(): Collection
    {
        return $this->bulletinExamens;
    }

    public function addBulletinExamen(BulletinExamens $bulletinExamen): self
    {
        if (!$this->bulletinExamens->contains($bulletinExamen)) {
            $this->bulletinExamens[] = $bulletinExamen;
            $bulletinExamen->setConsultation($this);
        }

        return $this;
    }

    public function removeBulletinExamen(BulletinExamens $bulletinExamen): self
    {
        if ($this->bulletinExamens->removeElement($bulletinExamen)) {
            // set the owning side to null (unless already changed)
            if ($bulletinExamen->getConsultation() === $this) {
                $bulletinExamen->setConsultation(null);
            }
        }

        return $this;
    }
}
