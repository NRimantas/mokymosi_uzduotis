<?php

namespace App\Entity;

use App\Repository\ToolMeasureRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ToolMeasureRepository::class)]
class ToolMeasure
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\ManyToOne(inversedBy: 'toolMeasure')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ProjectTool $projectTool = null;

    #[ORM\ManyToMany(targetEntity: Applicant::class, mappedBy: 'toolMeasure')]
    private Collection $applicants;

    public function __construct()
    {
        $this->applicants = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(string $title): self
    {
        $this->title = $title;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): self
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getProjectTool(): ?ProjectTool
    {
        return $this->projectTool;
    }

    public function setProjectTool(?ProjectTool $projectTool): self
    {
        $this->projectTool = $projectTool;

        return $this;
    }

    /**
     * @return Collection<int, Applicant>
     */
    public function getApplicants(): Collection
    {
        return $this->applicants;
    }

    public function addApplicant(Applicant $applicant): self
    {
        if (!$this->applicants->contains($applicant)) {
            $this->applicants->add($applicant);
            $applicant->addToolMeasure($this);
        }

        return $this;
    }

    public function removeApplicant(Applicant $applicant): self
    {
        if ($this->applicants->removeElement($applicant)) {
            $applicant->removeToolMeasure($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getTitle();
    }
}
