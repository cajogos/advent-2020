<?php

require_once __DIR__ . '/functions.php';

$file = file_get_contents(__DIR__ . '/input.txt');

$file2 = "
ecl:gry pid:860033327 eyr:2020 hcl:#fffffd
byr:1937 iyr:2017 cid:147 hgt:183cm

iyr:2013 ecl:amb cid:350 eyr:2023 pid:028048884
hcl:#cfa07d byr:1929

hcl:#ae17e1 iyr:2013
eyr:2024
ecl:brn pid:760753108 byr:1931
hgt:179cm

hcl:#cfa07d eyr:2025 pid:166559648
iyr:2011 ecl:brn hgt:59in
";

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
        // echo "Passport is valid!\n";
    }
    else
    {
        // echo "Passport is not valid!\n";
    }
}

echo "\n\nTotal Valid: $validTotal";
