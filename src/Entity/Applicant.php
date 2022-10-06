<?php

namespace App\Entity;

use DateTimeImmutable;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;
use App\Repository\ApplicantRepository;
use Symfony\Component\Validator\Constraints as Assert;

#[ORM\Entity(repositoryClass: ApplicantRepository::class)]
class Applicant
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'Šis laukelis turi būti užpildytas!')]
    #[Assert\Length(min:2, max:255, minMessage:'Vardą turi sudaryti ne mažiau nei 2 simboliai', maxMessage:'Vardą turi sudaryri ne daugiau nei 100 simbolių')]
    private ?string $first_name = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'Šis laukelis turi būti užpildytas!')]
    #[Assert\Length(min:2, max:255, minMessage:'Pavardę turi sudaryti ne mažiau nei 2 simboliai', maxMessage:'Pavardę turi sudaryri ne daugiau nei 100 simbolių')]
    private ?string $last_name = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'Šis laukelis turi būti užpildytas!')]
    #[Assert\Length(min:2, max:255, minMessage:'Adresą turi sudaryti ne mažiau nei 2 simboliai', maxMessage:'Adresą turi sudaryri ne daugiau nei 100 simbolių')]
    private ?string $address = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'Šis laukelis turi būti užpildytas!')]
    private ?string $email = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'Šis laukelis turi būti užpildytas!')]
    #[Assert\Length(min:8, max:12, minMessage:'Telefono numerį turi sudaryti bent 8 simboliai', maxMessage:'Telefono numerį turi sudaryti ne daugiau nei 12 simbolių')]
    private ?string $phone_number = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'Šis laukelis turi būti užpildytas!')]
    private ?string $unique_house_number = null;

    #[ORM\Column(length: 255)]
    #[Assert\NotBlank(message:'Šis laukelis turi būti užpildytas!')]
    private ?string $project_number = null;

    #[ORM\Column]
    private ?bool $compensation_received = null;

    #[ORM\Column]
    private ?DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?DateTimeImmutable $updatedAt = null;

    #[ORM\ManyToMany(targetEntity: ToolMeasure::class, inversedBy: 'applicants')]
    private Collection $toolMeasure;

    #[ORM\ManyToMany(targetEntity: ProjectTool::class, inversedBy: 'applicants')]
    private Collection $projectTool;

    public function __construct()
    {
        $this->toolMeasure = new ArrayCollection();
        $this->projectTool = new ArrayCollection();
    }


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


    public function getCreatedAt(): ?DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(DateTimeImmutable $updatedAt): self
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }

    /**
     * @return Collection<int, ToolMeasure>
     */
    public function getToolMeasure(): Collection
    {
        return $this->toolMeasure;
    }

    public function addToolMeasure(ToolMeasure $toolMeasure): self
    {
        if (!$this->toolMeasure->contains($toolMeasure)) {
            $this->toolMeasure->add($toolMeasure);
        }

        return $this;
    }

    public function removeToolMeasure(ToolMeasure $toolMeasure): self
    {
        $this->toolMeasure->removeElement($toolMeasure);

        return $this;
    }

    /**
     * @return Collection<int, ProjectTool>
     */
    public function getProjectTool(): Collection
    {
        return $this->projectTool;
    }

    public function addProjectTool(ProjectTool $projectTool): self
    {
        if (!$this->projectTool->contains($projectTool)) {
            $this->projectTool->add($projectTool);
        }

        return $this;
    }

    public function removeProjectTool(ProjectTool $projectTool): self
    {
        $this->projectTool->removeElement($projectTool);

        return $this;
    }
}
