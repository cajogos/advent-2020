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

        switch ($field)
        {
            case 'byr': // (Birth Year) - four digits; at least 1920 and at most 2002.
                $byr = (int) $passport['byr'];
                if ($byr < 1920 || $byr > 2002)
                {
                    $isValid = false; break 2;
                }
                break;
            case 'iyr': // (Issue Year) - four digits; at least 2010 and at most 2020.
                $iyr = (int) $passport['iyr'];
                if ($iyr < 2010 || $iyr > 2020)
                {
                    $isValid = false; break 2;
                }
                break;
            case 'eyr': // (Expiration Year) - four digits; at least 2020 and at most 2030.
                $eyr = (int) $passport['eyr'];
                if ($eyr < 2020 || $eyr > 2030)
                {
                    $isValid = false; break 2;
                }
                break;
            case 'hgt': // (Height) - a number followed by either cm or in
                $hgt = $passport['hgt'];
                if (strpos($hgt, 'cm') !== false)
                {
                    // If cm, the number must be at least 150 and at most 193.
                    $hgt = (int) $hgt;
                    if ($hgt < 150 || $hgt > 193)
                    {
                        $isValid = false; break 2;
                    }
                }
                else if (strpos($hgt, 'in') !== false)
                {
                    // If in, the number must be at least 59 and at most 76.
                    $hgt = (int) $hgt;
                    if ($hgt < 59 || $hgt > 76)
                    {
                        $isValid = false; break 2;
                    }
                }
                else
                {
                    $isValid = false; break 2;
                }
                break;
            case 'hcl': // (Hair Color) - a # followed by exactly six characters 0-9 or a-f.
                $hcl = $passport['hcl'];
                $regex = "/#([a-f0-9]{3}){1,2}\b/i";
                if (!preg_match($regex, $hcl))
                {
                    $isValid = false; break 2;
                }
                break;
            case 'ecl': // (Eye Color) - exactly one of: amb blu brn gry grn hzl oth.
                $ecl = $passport['ecl'];
                if (!in_array($ecl, [ 'amb', 'blu', 'brn', 'gry', 'grn', 'hzl', 'oth' ]))
                {
                    $isValid = false; break 2;
                }
                break;
            case 'pid': // (Passport ID) - a nine-digit number, including leading zeroes.
                $pid = $passport['pid'];
                if (strlen($pid) !== 9)
                {
                    $isValid = false; break 2;
                }
                break;
        }
    }

    if ($isValid)
    {
        $validTotal++;
    }
}

echo "\n\nTotal Valid: $validTotal";
