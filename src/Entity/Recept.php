<?php

namespace App\Entity;

use App\Repository\ReceptRepository;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=ReceptRepository::class)
 */
class Recept
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    private $id;

    /**
     * @ORM\Column(type="integer", nullable=true)
     */
    private $duur;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $dossis;

    /**
     * @ORM\Column(type="string", length=255, nullable=true)
     */
    private $datum;

    /**
     * @ORM\ManyToOne(targetEntity=Drug::class, inversedBy="recepten")
     * @ORM\JoinColumn(nullable=false)
     */
    private $medicijn;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getDuur(): ?int
    {
        return $this->duur;
    }

    public function setDuur(?int $duur): self
    {
        $this->duur = $duur;

        return $this;
    }

    public function getDossis(): ?string
    {
        return $this->dossis;
    }

    public function setDossis(?string $dossis): self
    {
        $this->dossis = $dossis;

        return $this;
    }

    public function getDatum(): ?string
    {
        return $this->datum;
    }

    public function setDatum(?string $datum): self
    {
        $this->datum = $datum;

        return $this;
    }

    public function getMedicijn(): ?Drug
    {
        return $this->medicijn;
    }

    public function setMedicijn(?Drug $medicijn): self
    {
        $this->medicijn = $medicijn;

        return $this;
    }
    
}
