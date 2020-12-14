<?php

namespace App\Entity;

use App\Repository\DrugRepository;
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
}
