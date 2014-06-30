<?php

namespace Sudoku;

use Sudoku\Grid\Grid;
use Sudoku\Strategy\StrategyInterface;

class Solver
{
    /** @var StrategyInterface[] */
    private $strategies;

    /**
     * Tries to solve one step of the Sudoku
     *
     * @param Grid $grid
     *
     * @return Grid
     */
    public function step(Grid $grid)
    {
        foreach ($this->strategies as $strategy) {
            if ($strategy->execute($grid)) {
                return $grid;
            }
        }

        throw new \LogicException('Im stuck');
    }

    public function addStrategy(StrategyInterface $strategy)
    {
        $this->strategies[] = $strategy;
    }
} 