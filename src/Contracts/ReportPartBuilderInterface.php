<?php

namespace Lle\BiBundle\Contracts;

interface ReportPartBuilderInterface
{
    public function genPdf(\TCPDF &$pdf): void;
    public function renderHtml(): string;
}
