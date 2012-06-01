<?php

$CI = & get_instance();
$CI->template->write_view('content', 'views/error/notfound', $CI->data);
$CI->template->render();