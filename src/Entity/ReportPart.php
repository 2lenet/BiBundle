<?php

namespace Lle\BiBundle\Entity;

use App\Repository\ReportPartRepository;
use Doctrine\ORM\Mapping as ORM;

#[ORM\Entity(repositoryClass: ReportPartRepository::class)]
class ReportPart
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[ORM\Column(type: 'integer')]
    private $id;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $title;
    #[ORM\Column(type: 'string', length: 255, nullable: true)]
    private $datasourceFqcn;
    #[ORM\Column(type: 'boolean')]
    private $pagebreak;
    #[ORM\ManyToOne(targetEntity: Report::class, inversedBy: 'parts')]
    #[ORM\JoinColumn(nullable: false)]
    private $report;
    #[ORM\Column(type: 'string', length: 255)]
    private $partBuilderFqcn;

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

    public function getDatasourceFqcn(): ?string
    {
        return $this->datasourceFqcn;
    }

    public function setDatasourceFqcn(?string $datasourceFqcn): self
    {
        $this->datasourceFqcn = $datasourceFqcn;

        return $this;
    }

    public function isPagebreak(): ?bool
    {
        return $this->pagebreak;
    }

    public function setPagebreak(bool $pagebreak): self
    {
        $this->pagebreak = $pagebreak;

        return $this;
    }

    public function getReport(): ?Report
    {
        return $this->report;
    }

    public function setReport(?Report $report): self
    {
        $this->report = $report;

        return $this;
    }

    public function getPartBuilderFqcn(): ?string
    {
        return $this->partBuilderFqcn;
    }

    public function setPartBuilderFqcn(string $partBuilderFqcn): self
    {
        $this->partBuilderFqcn = $partBuilderFqcn;

        return $this;
    }
}
