<?php

require_once '../vendor/autoload.php';

use Sudoku\Sudoku;

$sudoku = new Sudoku($_POST['grid']);