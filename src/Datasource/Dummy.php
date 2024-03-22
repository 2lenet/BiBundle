<?php

namespace Lle\BiBundle\Datasource;

use Lle\BiBundle\Dto\FieldDto;

class Dummy implements \Lle\BiBundle\Contracts\DatasourceInterface
{
    function getDatas(): iterable
    {
        return [
            ["col1"=>"coucou", "col2"=>"tata"],
            ["col1"=>"coucou", "col2"=>"Bastien"],
            ["col1"=>"coucou", "col2"=>"Nathan"],
            ["col1"=>"coucou", "col2"=>"Valentin"],
            ["col1"=>"coucou", "col2"=>"Emilie"],
        ];
    }

    function getFields(): array
    {
        return ["col1"=>new FieldDto(), "col2"=>new FieldDto()];
    }
}
