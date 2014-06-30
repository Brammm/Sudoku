<?php

namespace Sudoku\Strategy;

use Sudoku\Grid\Grid;

interface StrategyInterface
{

    /**
     * Executes the strategy on the Grid
     * Tries to solve one cell
     * Returns a boolean wether the strategy was able to solve a cell or not
     *
     * @param Grid $grid
     *
     * @return boolean
     */
    public function execute(Grid $grid);
} 