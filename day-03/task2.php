<?php

require_once __DIR__ . '/functions.php';


$file = file_get_contents(__DIR__ . '/input.txt');
$file = trim($file);

$lines = explode("\n", $file);

$matrix = produce_matrix($lines);

$deltas = [
    [1, 1],
    [1, 3],
    [1, 5],
    [1, 7],
    [2, 1]
];

$totals = 1;
foreach ($deltas as $d)
{
    $trees = traverse($matrix, $d[0], $d[1]);
    echo "Found {$trees} trees.\n";

    $totals *= $trees;
}

echo "Total: {$totals}.";