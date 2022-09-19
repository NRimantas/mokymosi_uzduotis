<?php

namespace App\Entity;

use App\Repository\ApplicantRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ApplicantRepository::class)]
class Applicant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $first_name = null;

    #[ORM\Column(length: 255)]
    private ?string $last_name = null;

    #[ORM\Column(length: 255)]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[ORM\Column(length: 11)]
    private ?string $phone_number = null;

    #[ORM\Column(length: 255)]
    private ?string $unique_house_number = null;

    #[ORM\Column(length: 255)]
    private ?string $project_number = null;

    #[ORM\Column]
    private ?bool $compensation_received = null;

    #[ORM\Column(type: Types::DATE_MUTABLE)]
    private ?\DateTimeInterface $created = null;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->first_name;
    }

    public function setFirstName(string $first_name): self
    {
        $this->first_name = $first_name;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->last_name;
    }

    public function setLastName(string $last_name): self
    {
        $this->last_name = $last_name;

        return $this;
    }

    public function getAddress(): ?string
    {
        return $this->address;
    }

    public function setAddress(string $address): self
    {
        $this->address = $address;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;

        return $this;
    }

    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }

    public function setPhoneNumber(string $phone_number): self
    {
        $this->phone_number = $phone_number;

        return $this;
    }

    public function getUniqueHouseNumber(): ?string
    {
        return $this->unique_house_number;
    }

    public function setUniqueHouseNumber(string $unique_house_number): self
    {
        $this->unique_house_number = $unique_house_number;

        return $this;
    }

    public function getProjectNumber(): ?string
    {
        return $this->project_number;
    }

    public function setProjectNumber(string $project_number): self
    {
        $this->project_number = $project_number;

        return $this;
    }

    public function isCompensationReceived(): ?bool
    {
        return $this->compensation_received;
    }

    public function setCompensationReceived(bool $compensation_received): self
    {
        $this->compensation_received = $compensation_received;

        return $this;
    }

    public function getCreated(): ?\DateTimeInterface
    {
        return $this->created;
    }

    public function setCreated(\DateTimeInterface $created): self
    {
        $this->created = $created;

        return $this;
    }
}
