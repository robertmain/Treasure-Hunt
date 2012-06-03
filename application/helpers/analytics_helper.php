<?php

function activityToGraph($foundTreasure) {
    $data = Array();
    $data[] = Array("Time", "Treasure Found");
    foreach ($foundTreasure as $Treasure) {
        if ($Treasure->minute < 10) {
            $Treasure->minute = '0' . $Treasure->minute;
        }
        $data[] = Array($Treasure->hour . ':' . $Treasure->minute, intval($Treasure->treasure_found));
    }
    return json_encode($data);
}

function signupToGraph($allPirates) {
    $data = Array();
    $data[] = Array("Time", "Registrations");
    foreach ($allPirates as $Pirate) {
        if ($Pirate->minute < 10) {
            $Pirate->minute = '0' . $Pirate->minute;
        }
        $data[] = Array($Pirate->hour . ':' . $Pirate->minute, intval($Pirate->signups));
    }
    return json_encode($data);
}