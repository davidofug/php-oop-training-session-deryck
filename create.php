<?php

define('ABS_PATH', dirname(__FILE__));

require_once ABS_PATH.'/models/user.php';

$newUser = new User();

$userInfo = [
    'date' => date('Y-m-d H:i:s'),
    'email' => 'lydia@email.com',
    'user_name' => 'lydia2',
    'first_name' => 'Lydia',
    'last_name' => 'Namyalo',
    'other_names' => 'Joyce',
    'password' => md5('yesyesyes'),
    'roles' => json_encode(['Contributer'])
];

$user = (object)$newUser->save($userInfo);

// var_dump($user);

if($user->id) {

    echo "\nSuccess: Member saved!\n";
    printf("User ID: %d\n", $user->id);
    
} else {
    echo "\nFailure: Member not saved!\n";
   var_dump($user);
}
