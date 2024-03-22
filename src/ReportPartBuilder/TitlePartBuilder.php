<?php
namespace Lle\BiBundle\ReportPartBuilder;

use Lle\BiBundle\Contracts\ReportPartBuilderInterface;
use Lle\BiBundle\Entity\ReportPart;

class TitlePartBuilder implements ReportPartBuilderInterface
{
    public function genPdf(\TCPDF &$pdf, ReportPart $part): void
    {
        $pdf->Cell(100,10, $part->getTitle());
        // TODO: Implement genPdf() method.
    }

    public function renderHtml(ReportPart $part): string
    {
        // TODO: Implement renderHtml() method.
    }
}
