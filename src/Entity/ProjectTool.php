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

    #[ORM\OneToMany(mappedBy: 'projectTool', targetEntity: ToolMeasure::class, orphanRemoval: true)]
    private Collection $tool_measure;

    public function __construct()
    {
        $this->tool_measure = new ArrayCollection();
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

    /**
     * @return Collection<int, ToolMeasure>
     */
    public function getToolMeasure(): Collection
    {
        return $this->tool_measure;
    }

    public function addToolMeasure(ToolMeasure $toolMeasure): self
    {
        if (!$this->tool_measure->contains($toolMeasure)) {
            $this->tool_measure->add($toolMeasure);
            $toolMeasure->setProjectTool($this);
        }

        return $this;
    }

    public function removeToolMeasure(ToolMeasure $toolMeasure): self
    {
        if ($this->tool_measure->removeElement($toolMeasure)) {
            // set the owning side to null (unless already changed)
            if ($toolMeasure->getProjectTool() === $this) {
                $toolMeasure->setProjectTool(null);
            }
        }

        return $this;
    }
}
