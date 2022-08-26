<?php

namespace App\Entity;

use App\Repository\OcExamensRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OcExamensRepository::class)
 */
class OcExamens
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $refExamen;

    /**
     * @ORM\Column(type="string", length=255)
     */
    private $designation;

    /**
     * @ORM\Column(type="string", length=50, nullable=true)
     */
    private $codeExamen;

    /**
     * @ORM\Column(type="float", nullable=true)
     */
    private $prixExamen;

    /**
     * @ORM\ManyToMany(targetEntity=BulletinExamens::class, mappedBy="examen")
     */
    private $bulletinExamens;

    public function __construct()
    {
        $this->bulletinExamens = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getRefExamen(): ?string
    {
        return $this->refExamen;
    }

    public function setRefExamen(string $refExamen): self
    {
        $this->refExamen = $refExamen;

        return $this;
    }

    public function getDesignation(): ?string
    {
        return $this->designation;
    }

    public function setDesignation(string $designation): self
    {
        $this->designation = $designation;

        return $this;
    }

    public function getCodeExamen(): ?string
    {
        return $this->codeExamen;
    }

    public function setCodeExamen(?string $codeExamen): self
    {
        $this->codeExamen = $codeExamen;

        return $this;
    }

    public function getPrixExamen(): ?float
    {
        return $this->prixExamen;
    }

    public function setPrixExamen(?float $prixExamen): self
    {
        $this->prixExamen = $prixExamen;

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
            $bulletinExamen->addExaman($this);
        }

        return $this;
    }

    public function removeBulletinExamen(BulletinExamens $bulletinExamen): self
    {
        if ($this->bulletinExamens->removeElement($bulletinExamen)) {
            $bulletinExamen->removeExaman($this);
        }

        return $this;
    }
}
