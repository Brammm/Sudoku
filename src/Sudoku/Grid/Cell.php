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

    function __construct($x, $y, $value)
    {
        $this->x     = $x;
        $this->y     = $y;
        $this->value = $value;
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

} 