<?php

function get_passports($file)
{
    $parsed = explode("\n\n", $file);
    $parsed = str_replace("\n", " ", $parsed);

    $passports = [];
    foreach ($parsed as $info)
    {
        $passport = [];
        $info = explode(" ", $info);
        foreach ($info as $data)
        {
            list($key, $value) = explode(":", $data);
            $passport[$key] = $value;
        }
        ksort($passport);
        $passports[] = $passport;
    }

    return $passports;
}