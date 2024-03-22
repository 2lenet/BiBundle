<?php

namespace Lle\BiBundle\Entity;


use App\Repository\ReportRepository;use Doctrine\Common\Collections\ArrayCollection;use Doctrine\Common\Collections\Collection;use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReportRepository::class)]
class Report
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;

    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $title;

    #[ORM\OneToMany(mappedBy: 'report', targetEntity: ReportPart::class)]
    private $parts;

    public function __construct()
    {
        $this->parts = new ArrayCollection();
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getTitle(): ?string
    {
        return $this->title;
    }

    public function setTitle(?string $title): self
    {
        $this->title = $title;

        return $this;
    }

    /**
     * @return Collection<int, ReportPart>
     */
    public function getParts(): Collection
    {
        return $this->parts;
    }

    public function addPart(ReportPart $part): self
    {
        if (!$this->parts->contains($part)) {
            $this->parts[] = $part;
            $part->setReport($this);
        }

        return $this;
    }

    public function removePart(ReportPart $part): self
    {
        if ($this->parts->removeElement($part)) {
            // set the owning side to null (unless already changed)
            if ($part->getReport() === $this) {
                $part->setReport(null);
            }
        }

        return $this;
    }
}
