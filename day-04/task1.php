<?php

require_once __DIR__ . '/functions.php';

$file = file_get_contents(__DIR__ . '/input.txt');
$file = trim($file);

$fields = [
    'byr', // Birth Year
    'iyr', // Issue Year
    'eyr', // Expiration Year
    'hgt', // Height
    'hcl', // Hair Color
    'ecl', // Eye Color
    'pid', // Passport ID
    'cid', // Country ID
];

$passports = get_passports($file);

// Validate the passports
$validTotal = 0;
foreach ($passports as $passport)
{
    $passportFields = array_keys($passport);
    $isValid = true;
    foreach ($fields as $field)
    {
        if ($field === 'cid') continue; // Ignore cid
        if (!in_array($field, $passportFields))
        {
            $isValid = false;
            break;
        }
    }

    if ($isValid)
    {
        $validTotal++;
    }
}

echo "\n\nTotal Valid: $validTotal";
