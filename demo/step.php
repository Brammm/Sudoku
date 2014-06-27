<?php

require_once '../vendor/autoload.php';

use Sudoku\Sudoku;

$sudoku = new Sudoku();

var_dump($_POST['cell']);