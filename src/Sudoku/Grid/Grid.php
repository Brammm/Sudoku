<?php

namespace Sudoku\Grid;

/**
 * Class Grid
 * @package Sudoku\Grid
 *
 * Represents a Sudoku grid of 9 * 9 cells
 */
class Grid 
{
    /** @var Cell[] */
    private $cells = [];

    /**
     * Create a new grid from a 9*9 array of values
     *
     * @param array $rows
     *
     * @return Grid
     */
    public static function fromArray(array $rows)
    {
        $grid = new Grid();
        $grid->validateRows($rows);
        foreach ($rows as $y => $row) {
            $grid->validateRow($y, $row);
            foreach ($row as $x => $value) {
                $grid->validateCellDoesntExist($grid, $x, $y);
                $grid->addCell($x, $y, $value);
            }
        }

        return $grid;
    }

    /**
     * Gets a cell according to it's coordinates
     *
     * @param $x
     * @param $y
     *
     * @return null|Cell
     */
    public function getCell($x, $y)
    {
        foreach ($this->cells as $cell) {
            if ($cell->isPosition($x, $y)) {
                return $cell;
            }
        }

        return null;
    }

    /**
     * Return array representation of the grid
     *
     * @return array
     */
    public function toArray()
    {
        $grid = [];
        foreach ($this->cells as $cell) {
            $grid[$cell->getX()][$cell->getY()] = $cell->getValue();
        }

        return $grid;
    }

    /**
     * Add cells to the grid.
     * Should only be used when creating a new grid.
     *
     * @param $x
     * @param $y
     * @param $value
     */
    protected function addCell($x, $y, $value)
    {
        $this->validateCoord($x);
        $this->validateCoord($y);
        $this->validateValue($value);

        $cell = new Cell($x, $y, $value);
        $this->cells[] = $cell;
    }

    protected function validateCoord($coord)
    {
        if ($coord < 0 or $coord > 8) {
            throw new \InvalidArgumentException('Coordinate must be between 0 and 8');
        }
    }

    /**
     * @param $value
     */
    protected function validateValue($value)
    {
        if (($value > 9 or $value < 1) and $value !== '' and is_int($value)) {
            throw new \InvalidArgumentException(sprintf('Value should be integer between 1 and 9, is %f', $value));
        }
    }

    /**
     * @param array $rows
     */
    protected function validateRows(array $rows)
    {
        if (count($rows) !== 9) {
            throw new \InvalidArgumentException(sprintf('Grid should hold 9 rows, holds %d', count($rows)));
        }
    }

    /**
     * @param       $y
     * @param array $row
     */
    protected function validateRow($y, array $row)
    {
        if (count($row) !== 9) {
            throw new \InvalidArgumentException(sprintf('Row %d should hold 9 values, holds %d', $y, count($row)));
        }
    }

    /**
     * @param $x
     * @param $y
     */
    protected function validateCellDoesntExist($x, $y)
    {
        if (null !== $this->getCell($x, $y)) {
            throw new \InvalidArgumentException(sprintf('Cell at coordinate %d, %d already exists', $x, $y));
        }
    }

    /**
     * Empty to prevent new Grid()
     */
    protected function __construct(){
    }

    /**
     * Empty to prevent clone.
     */
    private function __clone(){
    }
} 