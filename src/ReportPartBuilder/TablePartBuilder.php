<?php
namespace Lle\BiBundle\ReportPartBuilder;

use Lle\BiBundle\Contracts\DatasourceInterface;
use Lle\BiBundle\Contracts\ReportPartBuilderInterface;
use Lle\BiBundle\Entity\ReportPart;
use voilab\tctable\plugin\FitColumn;
use voilab\tctable\plugin\StripeRows;
use voilab\tctable\TcTable;

class TablePartBuilder implements ReportPartBuilderInterface
{
    public function genPdf(\TCPDF &$pdf, ReportPart $part, ?DatasourceInterface $data): void
    {
        $fields = $data->getFields();
        $minRowHeight = 6; //mm
        $tctable = new TcTable($pdf, $minRowHeight);

        $cols = [];
        foreach ($fields as $field) {
            $cols[$field->getCode()] = [
                "header"=>$field->getLibelle(),
                "align"=>$field->getAlign(),
                "width"=>100,
            ];
        }
        $tctable->addPlugin(new FitColumn(end($fields)->getCode()));
        $tctable->setColumns($cols);

        // get rows data
        $rows = $data->getDatas();

        // draw body
        $tctable->addBody($rows, function (TcTable $table, $row) {
            return $row;
        });

    }

    public function renderHtml(ReportPart $part): string
    {
        // TODO: Implement renderHtml() method.
    }
}
