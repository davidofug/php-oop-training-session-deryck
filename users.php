<?php 
define('ABS_PATH', dirname(__FILE__));

require_once ABS_PATH.'/models/user.php';

$users = new User();

print_r( $users->get() );