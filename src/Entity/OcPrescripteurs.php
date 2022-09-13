<?php

namespace App\Entity;

use App\Repository\OcPrescripteursRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OcPrescripteursRepository::class)
 */
class OcPrescripteurs
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $codePrescripteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $nomPrescripteur;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $prenomPrescripteur;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $genre;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateNaissPrescripteur;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $numTelPrescripteur;

    /**
     * @ORM\Column(type="text", nullable=true)
     */
    private $photoPrescriteur;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $dateEmbauche;

    /**
     * @ORM\ManyToOne(targetEntity=OcPrescripteurFonctions::class, inversedBy="prescripteurs")
     * @ORM\JoinColumn(nullable=false)
     */
    private $fonctionPrescription;

    /**
     * @ORM\OneToMany(targetEntity=OcConsultation::class, mappedBy="prescripteur")
     */
    private $consultations;

    public function __construct()
    {
        $this->consultations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodePrescripteur(): ?string
    {
        return $this->codePrescripteur;
    }

    public function setCodePrescripteur(string $codePrescripteur): self
    {
        $this->codePrescripteur = $codePrescripteur;

        return $this;
    }

    public function getNomPrescripteur(): ?string
    {
        return $this->nomPrescripteur;
    }

    public function setNomPrescripteur(string $nomPrescripteur): self
    {
        $this->nomPrescripteur = $nomPrescripteur;

        return $this;
    }

    public function getPrenomPrescripteur(): ?string
    {
        return $this->prenomPrescripteur;
    }

    public function setPrenomPrescripteur(string $prenomPrescripteur): self
    {
        $this->prenomPrescripteur = $prenomPrescripteur;

        return $this;
    }

    public function getGenre(): ?string
    {
        return $this->genre;
    }

    public function setGenre(string $genre): self
    {
        $this->genre = $genre;

        return $this;
    }

    public function getDateNaissPrescripteur(): ?\DateTimeInterface
    {
        return $this->dateNaissPrescripteur;
    }

    public function setDateNaissPrescripteur(?\DateTimeInterface $dateNaissPrescripteur): self
    {
        $this->dateNaissPrescripteur = $dateNaissPrescripteur;

        return $this;
    }

    public function getNumTelPrescripteur(): ?string
    {
        return $this->numTelPrescripteur;
    }

    public function setNumTelPrescripteur(?string $numTelPrescripteur): self
    {
        $this->numTelPrescripteur = $numTelPrescripteur;

        return $this;
    }

    public function getPhotoPrescriteur(): ?string
    {
        return $this->photoPrescriteur;
    }

    public function setPhotoPrescriteur(?string $photoPrescriteur): self
    {
        $this->photoPrescriteur = $photoPrescriteur;

        return $this;
    }

    public function getDateEmbauche(): ?\DateTimeInterface
    {
        return $this->dateEmbauche;
    }

    public function setDateEmbauche(?\DateTimeInterface $dateEmbauche): self
    {
        $this->dateEmbauche = $dateEmbauche;

        return $this;
    }

    public function getFonctionPrescription(): ?OcPrescripteurFonctions
    {
        return $this->fonctionPrescription;
    }

    public function setFonctionPrescription(?OcPrescripteurFonctions $fonctionPrescription): self
    {
        $this->fonctionPrescription = $fonctionPrescription;

        return $this;
    }

    /**
     * @return Collection<int, OcConsultation>
     */
    public function getConsultations(): Collection
    {
        return $this->consultations;
    }

    public function addConsultation(OcConsultation $consultation): self
    {
        if (!$this->consultations->contains($consultation)) {
            $this->consultations[] = $consultation;
            $consultation->setPrescripteur($this);
        }

        return $this;
    }

    public function removeConsultation(OcConsultation $consultation): self
    {
        if ($this->consultations->removeElement($consultation)) {
            // set the owning side to null (unless already changed)
            if ($consultation->getPrescripteur() === $this) {
                $consultation->setPrescripteur(null);
            }
        }

        return $this;
    }
}
