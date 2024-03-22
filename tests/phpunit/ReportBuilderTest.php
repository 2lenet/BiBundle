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
        $part1->setPartBuilderFqcn(TitlePartBuilder::class);
        $report->addPart($part1);
        $pdf = new \TCPDF();
        $reportBuilder = new \Lle\BiBundle\Service\ReportBuilder();
        $reportBuilder->buildPdfReport($pdf, $report);
    }
}
