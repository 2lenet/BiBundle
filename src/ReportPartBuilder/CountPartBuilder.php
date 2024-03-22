<?php
namespace Lle\BiBundle\ReportPartBuilder;

use Lle\BiBundle\Contracts\DatasourceInterface;
use Lle\BiBundle\Contracts\ReportPartBuilderInterface;
use Lle\BiBundle\Entity\ReportPart;

class CountPartBuilder implements ReportPartBuilderInterface
{
    public function genPdf(\TCPDF &$pdf, ReportPart $part, ?DatasourceInterface $data): void
    {
        // TODO: Implement genPdf() method.
    }

    public function renderHtml(ReportPart $part): string
    {
        // TODO: Implement renderHtml() method.
    }
}
