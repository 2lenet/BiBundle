<?php
namespace Lle\BiBundle\ReportPartBuilder;

use Lle\BiBundle\Contracts\DatasourceInterface;
use Lle\BiBundle\Contracts\ReportPartBuilderInterface;
use Lle\BiBundle\Entity\ReportPart;

class TablePartBuilder implements ReportPartBuilderInterface
{
    public function genPdf(\TCPDF &$pdf, ReportPart $part, ?DatasourceInterface $data): void
    {
        $minRowHeight = 6; //mm

        $tctable = new \voilab\tctable\TcTable($pdf, $minRowHeight);
        $tctable->setColumns([
            'col1' => [
                'isMultiLine' => true,
                'header' => 'Description',
                'width' => 100
                // check inline documentation to see what options are available.
                // Basically, it's everything TCPDF Cell and MultiCell can eat.
            ],
            'col2' => [
                'header' => 'Quantity',
                'width' => 20,
                'align' => 'R'
            ],
        ]);

        // get rows data
        $rows = $data->getDatas();

        // draw body
        $tctable->addBody($rows, function (\voilab\tctable\TcTable $table, \MyObj $row) {
            return [
                'col1' => $row["col1"],
                'col2' => $row["col2"],
            ];
        });

    }

    public function renderHtml(ReportPart $part): string
    {
        // TODO: Implement renderHtml() method.
    }
}
