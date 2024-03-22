<?php

namespace Lle\BiBundle\Service;

use Lle\BiBundle\Contracts\DatasourceInterface;
use Lle\BiBundle\Contracts\ReportPartBuilderInterface;

class DatasourceProvider
{
    protected ?array $datasources;

    public function __construct(
        iterable $datasources
    ) {
        /** @var DatasourceInterface $ds */
        foreach ($datasources as $ds) {
            dump($ds);
            $this->datasources[get_class($ds)] = $ds;
        }
    }

    public function getDatasources(): ?array
    {
        return $this->datasources;
    }

    public function getData(string $dataFqcn): ?DatasourceInterface
    {
        if (array_key_exists($dataFqcn, $this->datasources)) {
            return $this->datasources[$dataFqcn];
        }

        return null;
    }

}
