<?php
namespace Lle\BiBundle\ReportPartBuilder;

use Lle\BiBundle\Contracts\DatasourceInterface;
use Lle\BiBundle\Contracts\ReportPartBuilderInterface;
use Lle\BiBundle\Entity\ReportPart;

class TitlePartBuilder implements ReportPartBuilderInterface
{
    public function genPdf(\TCPDF &$pdf, ReportPart $part, ?DatasourceInterface $data): void
    {
        $pdf->Cell(100,10, $part->getTitle());
        $pdf->Ln();
        // TODO: Implement genPdf() method.
    }

    public function renderHtml(ReportPart $part): string
    {
        // TODO: Implement renderHtml() method.
    }
}
