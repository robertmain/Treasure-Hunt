<?php

function activityToGraph($foundTreasure) {
    $data = Array();
    $data[] = Array("Time", "Treasure Found");
    foreach ($foundTreasure as $Treasure) {
        $data[] = Array($Treasure->time, intval($Treasure->treasure_found));
    }
    return json_encode($data);
}