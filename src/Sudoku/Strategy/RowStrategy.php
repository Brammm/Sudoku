<?php

namespace Sudoku\Strategy;

use Sudoku\Grid\Cell;
use Sudoku\Grid\Collection;
use Sudoku\Grid\Grid;

class RowStrategy implements StrategyInterface
{

    /**
     * {@inheritDoc}
     */
    public function execute(Grid $grid)
    {
        foreach ($grid->getRows() as $row) {
            // Skip the row if it's complete
            if ($row->isComplete()) {
                continue;
            }

            if ($this->checkRow($row)) {
                return true;
            }
        }

        return false;
    }

    /**
     * @param Collection $row
     *
     * @return bool
     */
    private function checkRow(Collection $row)
    {
        foreach ($row->getCells() as $cell) {
            if ('' !== $cell->getValue()) {
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