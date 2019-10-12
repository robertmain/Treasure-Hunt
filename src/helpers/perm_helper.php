<?php

function isAdmin(): bool {
    $CI = & get_instance();
    if ($CI->Pirate->get_by(['id' => $CI->session->userdata('id')])->admin == '1') {
        return true;
    }
    else {
        return false;
    }
}

function isLoggedIn(): bool {
    $CI = & get_instance();
    if (
        ($CI->session->userdata('id'))
        && ($CI->Pirate->get_by(['id' => $CI->session->userdata('id')]))
    ) {
        return true;
    }
    else {
        return false;
    }
}

function isBanned(int $userID): bool {
    $CI = & get_instance();
    if ($CI->Pirate->get_by(['id' => $userID])->banned == '1') {
        return true;
    }
    else {
        return false;
    }
}
