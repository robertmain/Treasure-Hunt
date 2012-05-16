<?php

function isLoggedIn() {
    $CI = & get_instance();
    if (($CI->session->userdata('id')) == '') {
        return FALSE;
    }
    else {
        return TRUE;
    }
}

