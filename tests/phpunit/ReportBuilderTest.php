<?php

use Doctrine\ORM\EntityManagerInterface;
use Lle\BiBundle\Datasource\Dummy;
use Lle\BiBundle\Entity\Report;
use Lle\BiBundle\Entity\ReportPart;
use Lle\BiBundle\ReportPartBuilder\TablePartBuilder;
use Lle\BiBundle\ReportPartBuilder\TitlePartBuilder;
use Lle\BiBundle\Service\DatasourceProvider;
use Lle\BiBundle\Service\PartBuilderProvider;
use Lle\BiBundle\Service\ReportBuilder;
use PHPUnit\Framework\TestCase;

/**
 * Class ReportBuilderTest
 *
 */
class ReportBuilderTest extends TestCase
{

    public function testBuildPdf(): void
    {
        $report = new Report();
        $part1 = new ReportPart();
        $part1->setTitle("Coucou de Bi Bundle 🏎️💨");
        $part1->setPartBuilderFqcn(TitlePartBuilder::class);
        $report->addPart($part1);

        $part2 = new ReportPart();
        $part2->setTitle("Tableau de données");
        $part2->setPartBuilderFqcn(TablePartBuilder::class);
        $report->addPart($part2);

        $pdf = new \TCPDF();
        $pdf->AddPage();

        $builderProvider = new PartBuilderProvider([
            new TitlePartBuilder(),
            new TablePartBuilder()
        ]);

        $datasourceProvider = new DatasourceProvider([
            new Dummy(),
        ]);

        $reportBuilder = new ReportBuilder($builderProvider, $datasourceProvider);
        $reportBuilder->buildPdfReport($pdf, $report);
        file_put_contents("test.pdf", $pdf->getPDFData());
        $this->assertIsString($pdf->getPDFData());
    }

}
