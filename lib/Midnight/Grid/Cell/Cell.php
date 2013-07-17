<?php

namespace Midnight\Grid\Cell;

use Midnight\Grid\Row\RowInterface;

class Cell implements CellInterface
{

    private $row;
    private $value;

    function __construct($value = null)
    {
        $this->value = $value;
    }

    public function setRow(RowInterface $row)
    {
        $this->row = $row;
    }

    public function getValue()
    {
        return $this->value;
    }

    public function setValue($value)
    {
        $this->value = $value;
    }
}