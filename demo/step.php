<?php

require_once '../vendor/autoload.php';

use Sudoku\Sudoku;

$sudoku = new Sudoku();

print_r($_POST['grid']);