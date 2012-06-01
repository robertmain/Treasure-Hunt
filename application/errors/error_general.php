<?php

$CI = & get_instance();
$CI->data['heading'] = $heading;
$CI->data['message'] = $message;
$CI->template->write_view('content', 'views/error/error_general.php', $CI->data);
$CI->template->render();