<?php

namespace Sudoku\Strategy;

use Sudoku\Grid\Grid;

class RowStrategy implements StrategyInterface
{

    /**
     * {@inheritDoc}
     */
    public function execute(Grid $grid)
    {
        var_dump($grid); exit;
    }
}