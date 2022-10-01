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

    #[ORM\ManyToOne(inversedBy: 'tool_measure')]
    #[ORM\JoinColumn(nullable: false)]
    private ?ProjectTool $projectTool = null;

    #[ORM\ManyToMany(targetEntity: Applicant::class, mappedBy: 'tool_measure')]
    private Collection $applicant;

    public function __construct()
    {
        $this->applicant = new ArrayCollection();
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
    public function getApplicant(): Collection
    {
        return $this->applicant;
    }

    public function addApplicant(Applicant $applicant): self
    {
        if (!$this->applicant->contains($applicant)) {
            $this->applicant->add($applicant);
            $applicant->addToolMeasure($this);
        }

        return $this;
    }

    public function removeApplicant(Applicant $applicant): self
    {
        if ($this->applicant->removeElement($applicant)) {
            $applicant->removeToolMeasure($this);
        }

        return $this;
    }
}
