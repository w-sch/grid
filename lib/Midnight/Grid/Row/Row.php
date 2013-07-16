<?php

namespace Midnight\Grid\Row;

use Midnight\Grid\Cell\CellInterface;
use Midnight\Grid\Column\ColumnInterface;
use Midnight\Grid\GridInterface;

class Row implements RowInterface
{

    /**
     * @var GridInterface
     */
    private $grid;

    /**
     * @var \SplObjectStorage
     */
    private $cells;

    function __construct()
    {
        $this->cells = new \SplObjectStorage();
    }

    public function setGrid(GridInterface $grid)
    {
        $this->grid = $grid;
    }

    public function setCell(CellInterface $cell, ColumnInterface $column)
    {
        $this->getCells()->attach($cell, $column);
        $cell->setRow($this);
    }

    public function getCells()
    {
        return $this->cells;
    }
}