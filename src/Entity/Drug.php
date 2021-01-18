<?php

namespace App\Entity;

use App\Repository\DrugRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity(repositoryClass=DrugRepository::class)
 */
class Drug
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
    private $naam;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $werking;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $bijwerkingen;

    /**
     * @ORM\Column(type="string", length=100)
     */
    private $verzekerd;

    /**
     * @ORM\OneToMany(targetEntity=Recept::class, mappedBy="medicijn")
     */
    private $recepten;

    public function __construct()
    {
        $this->recepten = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getNaam(): ?string
    {
        return $this->naam;
    }

    public function setNaam(string $naam): self
    {
        $this->naam = $naam;

        return $this;
    }

    public function getWerking(): ?string
    {
        return $this->werking;
    }

    public function setWerking(string $werking): self
    {
        $this->werking = $werking;

        return $this;
    }

    public function getBijwerkingen(): ?string
    {
        return $this->bijwerkingen;
    }

    public function setBijwerkingen(string $bijwerkingen): self
    {
        $this->bijwerkingen = $bijwerkingen;

        return $this;
    }

    public function getVerzekerd(): ?string
    {
        return $this->verzekerd;
    }

    public function setVerzekerd(string $verzekerd): self
    {
        $this->verzekerd = $verzekerd;

        return $this;
    }

    /**
     * @return Collection|Recept[]
     */
    public function getNo(): Collection
    {
        return $this->no;
    }

    public function addNo(Recept $no): self
    {
        if (!$this->no->contains($no)) {
            $this->no[] = $no;
            $no->setMedicijn($this);
        }

        return $this;
    }

    public function removeNo(Recept $no): self
    {
        if ($this->no->removeElement($no)) {
            // set the owning side to null (unless already changed)
            if ($no->getMedicijn() === $this) {
                $no->setMedicijn(null);
            }
        }

        return $this;
    }
}
