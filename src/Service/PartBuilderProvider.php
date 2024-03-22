<?php

namespace Lle\BiBundle\Service;

use Lle\BiBundle\Contracts\ReportPartBuilderInterface;

class PartBuilderProvider
{
    protected ?array $partBuilders;

    public function __construct(
        iterable $partBuilders
    ) {
        /** @var ReportPartBuilderInterface $builder */
        foreach ($partBuilders as $builder) {
            $this->partBuilders[get_class($builder)] = $builder;
        }
    }

    public function getPartBuilders(): ?array
    {
        return $this->partBuilders;
    }

    public function getPartBuilder(string $builderFqcn): ?ReportPartBuilderInterface
    {
        if (array_key_exists($builderFqcn, $this->partBuilders)) {
            return $this->partBuilders[$builderFqcn];
        }

        return null;
    }

}
