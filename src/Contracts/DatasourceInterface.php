<?php

namespace Lle\BiBundle\Contracts;

interface DatasourceInterface
{
    function getDatas(): iterable;

    function getFields(): array;
}
