<?php

namespace Lle\BiBundle\Contracts;

use Lle\BiBundle\Entity\ReportPart;

interface ReportPartBuilderInterface
{
    public function genPdf(\TCPDF &$pdf, ReportPart $part, ?DatasourceInterface $data): void;
    public function renderHtml(ReportPart $part): string;
}
