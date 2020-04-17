<?php

require_once 'user.php';

$member = new User();

$member->email = "davidwampamba@gmail.com";
$member->password = md5('980Dkli');

$user = $member->save();

if(is_int($user)) {

    echo "\nSuccess: Member saved!\n";
    printf("User ID: %d\n", $user);

} else {
    echo "\nFailure: Member not saved!\n";
   var_dump($user);
}