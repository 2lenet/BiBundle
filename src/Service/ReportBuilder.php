<?php
namespace Lle\BiBundle\Service;

class ReportBuilder
{
    public function __construct(protected PartBuilderProvider $partBuilderProvider)
    {
    }

    function buildPdfReport(\TCPDF $tcpdf, \Lle\BiBundle\Entity\Report $report)
    {
        foreach ($report->getParts() as $part) {
            $builder = $this->buildBuilder($part);
            $builder->genPdf($tcpdf, $part);
        }
    }

    function buildBuilder(\Lle\BiBundle\Entity\ReportPart $part): \Lle\BiBundle\Contracts\ReportPartBuilderInterface
    {
        return $this->partBuilderProvider->getPartBuilder($part->getPartBuilderFqcn());
    }
}
