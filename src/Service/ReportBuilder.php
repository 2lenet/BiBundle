<?php
namespace Lle\BiBundle\Service;

class ReportBuilder
{
    function buildPdfReport(\TCPDF $tcpdf, \Lle\BiBundle\Entity\Report $report)
    {
        foreach ($report->getParts() as $part) {
            $builder = $this->buildBuilder($part);
            $builder->genPdf($tcpdf);
        }
    }

    function buildBuilder(\Lle\BiBundle\Entity\ReportPart $part): \Lle\BiBundle\Contracts\ReportPartBuilderInterface
    {
        $class= $part->getPartBuilderFqcn();
        $builder = new $class();
        return $builder;
    }
}
