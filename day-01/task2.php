<?php

$file = file_get_contents(__DIR__ . '/input.txt');
$file = trim($file);

$numbers = explode("\n", $file);

$num1 = -1;
$num2 = -1;
$num3 = -1;
for ($i = 0; $i < count($numbers); $i++)
{
    $num1 = (int) $numbers[$i];
    for ($j = 0; $j < count($numbers); $j++)
    {
        $num2 = (int) $numbers[$j];
        for ($k = 0; $k < count($numbers); $k++)
        {
            $num3 = (int) $numbers[$k];

            $sum = $num1 + $num2 + $num3;
            if ($sum == 2020) break 3;
        }
    }
}

$answer = $num1 * $num2 * $num3;

echo "\nThe answer is: {$answer} | The numbers were: {$num1}, {$num2}, {$num3}.\n";
