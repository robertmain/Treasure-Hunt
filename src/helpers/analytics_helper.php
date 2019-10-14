<?php

function activityToGraph($foundTreasure)
{
    $data = array_merge(
        [['Time', 'Treasure Found']],
        array_map(function ($Treasure) {
            return [$Treasure->hour . ':' . $Treasure->minute, intval($Treasure->treasure_found)];
        }, $foundTreasure)
    );
    return json_encode($data);
}

function signupToGraph($allPirates)
{
    $data = array_merge(
        [['Time', 'Registrations']],
        array_map(function ($Pirate) {
            return [$Pirate->hour . ':' . $Pirate->minute, intval($Pirate->signups)];
        }, $allPirates)
    );
    return json_encode($data);
}
