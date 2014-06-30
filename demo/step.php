<?php

require_once '../vendor/autoload.php';

use Sudoku\Sudoku;

$sudoku = new Sudoku($_POST['grid']);
$grid   = $sudoku->step();

header('Content-Type: application/json');
echo json_encode($grid->toArray());