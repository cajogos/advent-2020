<?php

$file = file_get_contents(__DIR__ . '/input.txt');

$file2 = "
..##.......
#...#...#..
.#....#..#.
..#.#...#.#
.#...##..#.
..#.##.....
.#.#.#....#
.#........#
#.##...#...
#...##....#
.#..#...#.#
";

$file = trim($file);

$lines = explode("\n", $file);

$rows = count($lines);
echo "number of rows: $rows\n\n";

$matrix = [];
for ($i = 0; $i < $rows; $i++)
{
    $matrix[$i] = [];

    $line = $lines[$i];
    for ($j = 0; $j < strlen($line); $j++)
    {
        $matrix[$i][] = $lines[$i][$j];
    }
}

$map = $matrix;

$r = 0;
$c = 0;
$cur = 0;
$trees = 0;
while ($cur < $rows)
{
    $r += 1;
    $c += 3;

    $rr = $r % $rows;
    $cc = $c % count($matrix[$cur]);

    $object = $matrix[$rr][$cc];

    if ($object === '#')
    {
        $map[$rr][$cc] = "$cur*";
        $trees++;
    }
    else
    {
        $map[$rr][$cc] = "$cur";
    }
    
    echo "CUR: $cur | RR: $rr | CC: $cc | Object: $object \n";
    
    $cur++;
}

echo "Found {$trees} trees.\n";

echo "\n----";
foreach ($map as $row => $cols)
{
    echo "\n";
    foreach ($cols as $col)
    {
        echo $col . " ";
    }
}
echo "\n----";