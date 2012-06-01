<?php

$CI = & get_instance();
$CI->load->vars($CI->data);
$CI->template->write_view('content', 'views/error/notfound.php');
$CI->template->render();