<?php

function produce_matrix($lines)
{
    $matrix = [];
    for ($r = 0; $r < count($lines); $r++)
    {
        $matrix[$r] = [];
        for ($c = 0; $c < strlen($lines[$r]); $c++)
        {
            $matrix[$r][$c] = $lines[$r][$c];
        }
    }
    return $matrix;
}

function traverse($matrix, $dRow, $dCol)
{
    $trees = 0;
    $cc = 0;
    for ($row = $dRow; $row < count($matrix); $row += $dRow)
    {
        $cc += $dCol;
        $col = $cc % count($matrix[0]);

        $object = $matrix[$row][$col];
        if ($object === '#') $trees++;
    }
    return $trees;
}
