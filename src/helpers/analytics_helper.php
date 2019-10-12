<?php

function activityToGraph($foundTreasure)
{
    $data = array();
    $data[] = array("Time", "Treasure Found");
    foreach ($foundTreasure as $Treasure) {
        if ($Treasure->minute < 10) {
            $Treasure->minute = '0' . $Treasure->minute;
        }
        $data[] = array($Treasure->hour . ':' . $Treasure->minute, intval($Treasure->treasure_found));
    }
    return json_encode($data);
}

function signupToGraph($allPirates)
{
    $data = array();
    $data[] = array("Time", "Registrations");
    foreach ($allPirates as $Pirate) {
        if ($Pirate->minute < 10) {
            $Pirate->minute = '0' . $Pirate->minute;
        }
        $data[] = array($Pirate->hour . ':' . $Pirate->minute, intval($Pirate->signups));
    }
    return json_encode($data);
}
