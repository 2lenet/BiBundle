<?php

use Doctrine\ORM\EntityManagerInterface;
use PHPUnit\Framework\TestCase;

/**
 * Class ReportBuilderTest
 *
 */
class ReportBuilderTest extends TestCase
{

    public function testBuildPdf(): void
    {
        $report = new \Lle\BiBundle\Entity\Report();
        $part1 = new \Lle\BiBundle\Entity\ReportPart();
        $part1->setTitle("Coucou de Bi Bundle 🏎️💨");
        $part1->setPartBuilderFqcn(\Lle\BiBundle\ReportPartBuilder\TitlePartBuilder::class);
        $report->addPart($part1);
        $pdf = new \TCPDF();
        $pdf->AddPage();
        $builderProvider = new \Lle\BiBundle\Service\PartBuilderProvider([new \Lle\BiBundle\ReportPartBuilder\TitlePartBuilder()]);
        $reportBuilder = new \Lle\BiBundle\Service\ReportBuilder($builderProvider);
        $reportBuilder->buildPdfReport($pdf, $report);
        file_put_contents("test.pdf", $pdf->getPDFData());
        $this->assertIsString($pdf->getPDFData());
    }
}
