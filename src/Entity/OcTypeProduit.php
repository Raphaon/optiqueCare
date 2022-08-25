<?php

namespace App\Entity;

use App\Repository\OcTypeProduitRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=OcTypeProduitRepository::class)
 */
class OcTypeProduit
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
    private $codeType;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $typeName;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getCodeType(): ?string
    {
        return $this->codeType;
    }

    public function setCodeType(string $codeType): self
    {
        $this->codeType = $codeType;

        return $this;
    }

    public function getTypeName(): ?string
    {
        return $this->typeName;
    }

    public function setTypeName(string $typeName): self
    {
        $this->typeName = $typeName;

        return $this;
    }
}
