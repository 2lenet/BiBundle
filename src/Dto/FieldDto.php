<?php
namespace Lle\BiBundle\Dto;

class FieldDto
{
    public string $code;
    public string $libelle;
    public bool $aggregable = false;
    public bool $totalize = false;
}
