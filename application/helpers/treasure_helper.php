<?php

/**
 *
 * @param Integer $treasure
 * @param Integer $pirate
 * @return type Boolean
 */
function isFound($treasure, $pirate) {
    $CI = & get_instance();
    $CI->load->model('mytreasure_model');
    if ($CI->mytreasure_model->get_by(array('pirate' => $pirate, 'treasure' => $treasure))) {
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
    $CI->load->model('myreasure_model', 'treasure_model');
    if (sizeof($CI->mytreasure_model->get_by(array('pirate' => $pirate))) == sizeof($CI->treasure_model->get_all())) {
        return TRUE;
    }
    else {
        return FALSE;
    }
}