<?php

namespace Sudoku\Grid;

/**
 * Class Cell
 * @package Sudoku\Grid
 *
 * Represents a single cell in a Sudoku grid
 */
class Cell 
{
    /** @var int */
    private $x;
    /** @var int */
    private $y;
    /** @var int */
    private $value;
    /** @var Grid */
    private $grid;

    function __construct($x, $y, $value, Grid $grid)
    {
        $this->x     = $x;
        $this->y     = $y;
        $this->value = $value === ''
            ? ''
            : (int)$value;
        $this->grid  = $grid;
    }

    /**
     * @param $value
     *
     * @return $this
     */
    public function setValue($value)
    {
        $this->value = $value;
        return $this;
    }

    /**
     * @return int
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * @return int
     */
    public function getX()
    {
        return $this->x;
    }

    /**
     * @return int
     */
    public function getY()
    {
        return $this->y;
    }

    /**
     * Checks if the cell has the provided coordinates
     *
     * @param $x
     * @param $y
     *
     * @return bool
     */
    public function isPosition($x, $y)
    {
        if ($x === $this->x && $y === $this->y) {
            return true;
        }

        return false;
    }

    /**
     * Returns the row the cell belongs too
     *
     * @return Collection
     */
    public function getRow()
    {
        $collection = new Collection();
        foreach ($this->grid->getCells() as $cell) {
            if ($cell->getY() === $this->y) {
                $collection->addCell($cell);
            }
        }

        return $collection;
    }

    /**
     * Returns the column the cell belongs too
     *
     * @return Collection
     */
    public function getColumn()
    {
        $collection = new Collection();
        foreach ($this->grid->getCells() as $cell) {
            if ($cell->getX() === $this->x) {
                $collection->addCell($cell);
            }
        }

        return $collection;
    }

    /**
     * Returns the 3*3 subgrid the cell belongs too
     *
     * @return Collection
     */
    public function getSubgrid()
    {
        $xMin = $this->x - ($this->x % 3);
        $xMax = $xMin + 2;
        $yMin = $this->y - ($this->y % 3);
        $yMax = $yMin + 2;

        $collection = new Collection();

        for($x = $xMin; $x <= $xMax; $x++) {
            for ($y = $yMin; $y <= $yMax; $y++) {
                $collection->addCell($this->grid->getCell($x, $y));
            }
        }

        return $collection;
    }

} 