<?php

function activityToGraph($foundTreasure) {
    $data = Array();
    $data[] = Array("Time", "Treasure Found");
    foreach ($foundTreasure as $Treasure) {
        $data[] = Array($Treasure->hour . ':' . $Treasure->minute, intval($Treasure->treasure_found));
    }
    return json_encode($data);
}