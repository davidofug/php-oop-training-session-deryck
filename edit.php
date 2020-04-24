<?php

define('ABS_PATH', dirname(__FILE__));

require_once ABS_PATH.'/models/user.php';

$oldUserInfo = new User();
$old_user_info = $oldUserInfo->get(28);

$email = 'lydianamyalo@gmail.com';
$other_names ="Joyce";

$newUserInfo = [
    'id' => (int) $old_user_info['id'],
    'email' => isset($email) ? $email : $old_user_info['email'],
    'other_names' => isset($other_names) ? $other_names : $old_user_info['other_names'],
    'password' => isset($password) ? $password : $old_user_info['user_pass'],
    'first_name' => isset($first_name) ? $first_name : $old_user_info['first_name'],
    'last_name' =>isset($last_name) ? $last_name : $old_user_info['last_name'],
    'roles' => isset($roles) ? json_encode([$roles]) : $old_user_info['roles'],
    'updated_at' => date('Y-m-d H:i:s')
];

$newInfo = $oldUserInfo->save( $newUserInfo );

if(isset($newInfo['id'])) {
    echo "\nUpdated successfully\n";
    print_r($newInfo);
} else {
    echo "\nFailed to update\n";

    var_dump($newInfo);

    echo "\n Debug info\n";
}