<?php
namespace Lle\BiBundle\Service;

use Lle\BiBundle\Contracts\DatasourceInterface;
use Lle\BiBundle\Contracts\ReportPartBuilderInterface;
use Lle\BiBundle\Entity\ReportPart;

class ReportBuilder
{
    public function __construct(
        protected PartBuilderProvider $partBuilderProvider,
        protected DatasourceProvider $datasourceProvider,
    )
    {
    }

    function buildPdfReport(\TCPDF $tcpdf, \Lle\BiBundle\Entity\Report $report)
    {
        foreach ($report->getParts() as $part) {
            $builder = $this->buildBuilder($part);
            $data = $this->getData($part);
            $builder->genPdf($tcpdf, $part, $data);
        }
    }

    function buildBuilder(ReportPart $part): ReportPartBuilderInterface
    {
        return $this->partBuilderProvider->getPartBuilder($part->getPartBuilderFqcn());
    }

    function getData(ReportPart $part): ?DatasourceInterface
    {
        if ($part->getDatasourceFqcn()) {
            return $this->datasourceProvider->getData($part->getDatasourceFqcn());
        }
        return null;
    }
}
