<?php

function get_answers_per_group($file)
{
    $groups = explode("\n\n", $file);
    for ($i = 0; $i < count($groups); $i++)
    {
        $groups[$i] = explode("\n", $groups[$i]);
    }
    return $groups;
}