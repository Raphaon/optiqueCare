<?php

namespace App\Entity;

use App\Repository\OcPatientsRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OcPatientsRepository::class)
 */
class OcPatients
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
    private $matricule;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $lastName;

    /**
     * @ORM\Column(type="string", length=20)
     */
    private $gender;

    /**
     * @ORM\Column(type="date", nullable=true)
     */
    private $birthday;

    /**
     * @ORM\Column(type="string", length=30, nullable=true)
     */
    private $phone;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $profession;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $email;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $location;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $hobbies;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $picture;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ice_name;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $ice_phone;

    /**
     * @ORM\OneToMany(targetEntity=OcPatientParameters::class, mappedBy="patient")
     */
    private $parameters;

    /**
     * @ORM\OneToMany(targetEntity=OcConsultation::class, mappedBy="patient")
     */
    private $consultations;

    public function __construct()
    {
        $this->parameters = new ArrayCollection();
        $this->consultations = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getMatricule(): ?string
    {
        return $this->matricule;
    }

    public function setMatricule(string $matricule): self
    {
        $this->matricule = $matricule;

        return $this;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): self
    {
        $this->name = $name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(?string $lastName): self
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getGender(): ?string
    {
        return $this->gender;
    }

    public function setGender(string $gender): self
    {
        $this->gender = $gender;

        return $this;
    }

    public function getBirthday(): ?\DateTimeInterface
    {
        return $this->birthday;
    }

    public function setBirthday(?\DateTimeInterface $birthday): self
    {
        $this->birthday = $birthday;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(?string $phone): self
    {
        $this->phone = $phone;

        return $this;
    }

    public function getProfession(): ?string
    {
        return $this->profession;
    }

    public function setProfession(?string $profession): self
    {
        $this->profession = $profession;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getLocation(): ?string
    {
        return $this->location;
    }

    public function setLocation(string $location): self
    {
        $this->location = $location;

        return $this;
    }

    public function getHobbies(): ?string
    {
        return $this->hobbies;
    }

    public function setHobbies(?string $hobbies): self
    {
        $this->hobbies = $hobbies;

        return $this;
    }

    public function getPicture(): ?string
    {
        return $this->picture;
    }

    public function setPicture(?string $picture): self
    {
        $this->picture = $picture;

        return $this;
    }

    public function getIceName(): ?string
    {
        return $this->ice_name;
    }

    public function setIceName(?string $ice_name): self
    {
        $this->ice_name = $ice_name;

        return $this;
    }

    public function getIcePhone(): ?string
    {
        return $this->ice_phone;
    }

    public function setIcePhone(?string $ice_phone): self
    {
        $this->ice_phone = $ice_phone;

        return $this;
    }

    /**
     * @return Collection<int, OcPatientParameters>
     */
    public function getParameters(): Collection
    {
        return $this->parameters;
    }

    public function addParameter(OcPatientParameters $parameter): self
    {
        if (!$this->parameters->contains($parameter)) {
            $this->parameters[] = $parameter;
            $parameter->setPatient($this);
        }

        return $this;
    }

    public function removeParameter(OcPatientParameters $parameter): self
    {
        if ($this->parameters->removeElement($parameter)) {
            // set the owning side to null (unless already changed)
            if ($parameter->getPatient() === $this) {
                $parameter->setPatient(null);
            }
        }

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
            $consultation->setPatient($this);
        }

        return $this;
    }

    public function removeConsultation(OcConsultation $consultation): self
    {
        if ($this->consultations->removeElement($consultation)) {
            // set the owning side to null (unless already changed)
            if ($consultation->getPatient() === $this) {
                $consultation->setPatient(null);
            }
        }

        return $this;
    }
}
