<?php

require_once __DIR__ . '/functions.php';

$file = file_get_contents(__DIR__ . '/input.txt');
$file = trim($file);

$groupAnswers = get_answers_per_group($file);

$counts = [];
foreach ($groupAnswers as $group)
{
    $yeses = [];
    foreach ($group as $answers)
    {
        for ($i = 0; $i < strlen($answers); $i++)
        {
            $yeses[$answers[$i]] = true;
        }
    }
    $counts[] = count($yeses);
}

echo array_sum($counts);
