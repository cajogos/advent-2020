<?php

require_once __DIR__ . '/functions.php';

$file = file_get_contents(__DIR__ . '/input.txt');
$file = trim($file);

$lines = explode("\n", $file);

$matrix = produce_matrix($lines);

$trees = traverse($matrix, 1, 3);
echo "Found {$trees} trees.\n";
