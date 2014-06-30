<?php

namespace Sudoku\Strategy;

use Sudoku\Grid\Cell;
use Sudoku\Grid\Collection;
use Sudoku\Grid\Grid;

class SingleCell implements StrategyInterface
{

    /**
     * {@inheritDoc}
     */
    public function execute(Grid $grid)
    {
        foreach ($grid->getCells() as $cell) {
            if (! $cell->isEmpty()) {
                continue;
            }

            if ($this->checkCell($cell)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param Cell $cell
     *
     * @return bool
     */
    private function checkCell(Cell $cell)
    {
        $possibleValues = range(1, 9);

        $possibleValues = array_diff(
            $possibleValues,
            $cell->getRow()->getValues(),
            $cell->getColumn()->getValues(),
            $cell->getSubgrid()->getValues()
        );

        $possibleValues = array_values($possibleValues); // reset keys

        if (1 === count($possibleValues)) {
            $cell->setValue($possibleValues[0]);

            return true;
        }

        return false;
    }
}