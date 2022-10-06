<?php

namespace App\Entity;

use App\Repository\ProjectToolRepository;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ProjectToolRepository::class)]
class ProjectTool
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column]
    private ?int $id = null;

    #[ORM\Column(length: 255)]
    private ?string $title = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\OneToMany(mappedBy: 'projectTool', targetEntity: ToolMeasure::class, orphanRemoval: true)]
    private Collection $toolMeasure;

    #[ORM\ManyToMany(targetEntity: Applicant::class, mappedBy: 'projectTool')]
    private Collection $applicants;

    public function __construct()
    {
        $this->toolMeasure = new ArrayCollection();
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
            $toolMeasure->setProjectTool($this);
        }

        return $this;
    }

    public function removeToolMeasure(ToolMeasure $toolMeasure): self
    {
        if ($this->toolMeasure->removeElement($toolMeasure)) {
            // set the owning side to null (unless already changed)
            if ($toolMeasure->getProjectTool() === $this) {
                $toolMeasure->setProjectTool(null);
            }
        }

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
            $applicant->addProjectTool($this);
        }

        return $this;
    }

    public function removeApplicant(Applicant $applicant): self
    {
        if ($this->applicants->removeElement($applicant)) {
            $applicant->removeProjectTool($this);
        }

        return $this;
    }

    public function __toString()
    {
        return $this->getTitle();
    }
}
