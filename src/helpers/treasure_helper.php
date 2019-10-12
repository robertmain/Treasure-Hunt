<?php

/**
 *
 * @param Integer $treasure
 * @param Integer $pirate
 * @return Boolean
 */
function isFound($treasure, $pirate) {
    $CI = & get_instance();
    $CI->load->model('Mytreasure');
    if ($CI->Mytreasure->get_by(array('pirate' => $pirate, 'treasure' => $treasure))) {
        return TRUE;
    }
    else {
        return FALSE;
    }
}

/**
 *
 * @param Integer $pirate
 */
function foundAll($pirate) {
    $CI = & get_instance();
    $CI->load->model(['Mytreasure', 'Treasure']);
    if (sizeof($CI->Mytreasure->get_many_by(array('pirate' => $pirate))) == sizeof($CI->Treasure->get_all())) {
        return TRUE;
    }
    else {
        return FALSE;
    }
}
