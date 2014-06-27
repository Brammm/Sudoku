<?php

namespace Sudoku\Grid;

/**
 * Class Collection
 * @package Sudoku\Grid
 *
 * Represents a collection of cells, wether it's a 3*3 square, a column or a row.
 */
class Collection 
{
    /** @var Cell[] */
    private $cells = [];

    /**
     * @return Cell[]
     */
    public function getCells()
    {
        return $this->cells;
    }

    /**
     * @param Cell $cell
     *
     * @return $this
     */
    public function addCell(Cell $cell)
    {
        $this->validateMaxCells();

        $this->cells[] = $cell;

        return $this;
    }

    /**
     * Validates the amount of cells in a collection
     */
    private function validateMaxCells()
    {
        if (count($this->cells) >= 9) {
            throw new \LogicException('Only 9 cells allowed in a collection');
        }
    }

    /**
     * Checks if a certain value is in the collection
     *
     * @param $value
     *
     * @return bool
     */
    public function hasValue($value)
    {
        foreach ($this->cells as $cell) {
            if ($value === $cell->getValue()) {
                return true;
            }
        }

        return false;
    }
} 