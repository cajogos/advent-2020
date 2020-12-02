<?php

$file = file_get_contents(__DIR__ . '/input.txt');
$file = trim($file);

$numbers = explode("\n", $file);

$num1 = -1;
$num2 = -1;
for ($i = 0; $i < count($numbers); $i++)
{
    $num1 = (int) $numbers[$i];
    for ($j = 0; $j < count($numbers); $j++)
    {
        $num2 = (int) $numbers[$j];
        $sum = $num1 + $num2;
        if ($sum == 2020) break 2;
    }
}

$answer = $num1 * $num2;

echo "The answer is: {$answer}.";
