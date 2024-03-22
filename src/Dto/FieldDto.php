<?php
namespace Lle\BiBundle\Dto;

class FieldDto
{
    protected string $code;
    protected string $libelle;
    protected bool $aggregable = false;
    protected bool $totalize = false;
    protected string $align = "L";

    public function __construct($code, $libelle=null, $align ="L")
    {
        $this->code = $code;
        $this->libelle = $libelle ?? $code;
        $this->align = $align;
    }

    public function getCode(): string
    {
        return $this->code;
    }

    public function setCode(string $code): FieldDto
    {
        $this->code = $code;

        return $this;
    }

    public function getLibelle(): string
    {
        return $this->libelle;
    }

    public function setLibelle(string $libelle): FieldDto
    {
        $this->libelle = $libelle;

        return $this;
    }

    public function isAggregable(): bool
    {
        return $this->aggregable;
    }

    public function setAggregable(bool $aggregable): FieldDto
    {
        $this->aggregable = $aggregable;

        return $this;
    }

    public function isTotalize(): bool
    {
        return $this->totalize;
    }

    public function setTotalize(bool $totalize): FieldDto
    {
        $this->totalize = $totalize;

        return $this;
    }

    public function getAlign(): string
    {
        return $this->align;
    }

    public function setAlign(string $align): FieldDto
    {
        $this->align = $align;

        return $this;
    }
}
