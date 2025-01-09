<?php

namespace App\Entity;

use App\Enum\CarGearbox;
use App\Repository\CarRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: CarRepository::class)]
class Car
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 100)]
    private ?string $name = null;

    #[ORM\Column(length: 500)]
    private ?string $description = null;

    #[ORM\Column]
    private ?int $monthlyAmount = null;

    #[ORM\Column]
    private ?int $dailyAmount = null;

    #[ORM\Column]
    private ?int $seatsNumber = null;

    #[ORM\Column(enumType: CarGearbox::class)]
    private ?CarGearbox $gearbox = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getName(): ?string
    {
        return $this->name;
    }

    public function setName(string $name): static
    {
        $this->name = $name;

        return $this;
    }

    public function getDescription(): ?string
    {
        return $this->description;
    }

    public function setDescription(string $description): static
    {
        $this->description = $description;

        return $this;
    }

    public function getMonthlyAmount(): ?int
    {
        return $this->monthlyAmount;
    }

    public function setMonthlyAmount(int $monthlyAmount): static
    {
        $this->monthlyAmount = $monthlyAmount;

        return $this;
    }

    public function getDailyAmount(): ?int
    {
        return $this->dailyAmount;
    }

    public function setDailyAmount(int $dailyAmount): static
    {
        $this->dailyAmount = $dailyAmount;

        return $this;
    }

    public function getSeatsNumber(): ?int
    {
        return $this->seatsNumber;
    }

    public function setSeatsNumber(int $seatsNumber): static
    {
        $this->seatsNumber = $seatsNumber;

        return $this;
    }

    public function getGearbox(): ?CarGearbox
    {
        return $this->gearbox;
    }

    public function setGearbox(CarGearbox $gearbox): static
    {
        $this->gearbox = $gearbox;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
