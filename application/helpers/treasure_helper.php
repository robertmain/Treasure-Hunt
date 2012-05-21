<?php

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