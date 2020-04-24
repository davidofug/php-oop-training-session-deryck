<?php

define('ABS_PATH', dirname(__FILE__));

require_once ABS_PATH.'/models/user.php';

$theUser = new User();
$result = $theUser->delete(19);

if($result) {
    echo "\nDeleted successfully\n";
} else {
    echo "\nFailed to Delete\n";
    if(!$result) {
        echo "\nUser doesn't exist\n";
    } else {
        var_dump($result);
    }
}