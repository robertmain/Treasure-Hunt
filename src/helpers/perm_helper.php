<?php

function isAdmin() {
    $CI = & get_instance();
    if ($CI->pirate_model->get_by('id', $CI->session->userdata('id'))->admin == '1') {
        return TRUE;
    }
    else {
        return FALSE;
    }
}

function isLoggedIn() {
    $CI = & get_instance();
    if (($CI->session->userdata('id')) && ($CI->pirate_model->get_by('id', $CI->session->userdata('id')))) {
        return TRUE;
    }
    else {
        return FALSE;
    }
}

function isBanned($userID) {
    $CI = & get_instance();
    if ($CI->pirate_model->get_by('id', $userID)->banned == '1') {
        return TRUE;
    }
    else {
        return FALSE;
    }
}