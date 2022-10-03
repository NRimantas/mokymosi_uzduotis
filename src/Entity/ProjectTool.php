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

    #[ORM\Column(length: 255)]
    private ?string $tool_measure = null;

    #[ORM\OneToMany(mappedBy: 'projectTool', targetEntity: Applicant::class, orphanRemoval: true)]
    private Collection $user_id;

    public function __construct()
    {
        $this->user_id = new ArrayCollection();
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

    public function getToolMeasure(): ?string
    {
        return $this->tool_measure;
    }

    public function setToolMeasure(string $tool_measure): self
    {
        $this->tool_measure = $tool_measure;

        return $this;
    }

    /**
     * @return Collection<int, Applicant>
     */
    public function getUserId(): Collection
    {
        return $this->user_id;
    }

    public function addUserId(Applicant $userId): self
    {
        if (!$this->user_id->contains($userId)) {
            $this->user_id->add($userId);
            $userId->setProjectTool($this);
        }

        return $this;
    }

    public function removeUserId(Applicant $userId): self
    {
        if ($this->user_id->removeElement($userId)) {
            // set the owning side to null (unless already changed)
            if ($userId->getProjectTool() === $this) {
                $userId->setProjectTool(null);
            }
        }

        return $this;
    }
}
