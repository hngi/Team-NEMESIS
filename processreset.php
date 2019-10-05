<?php 
//Password reset is complicated due to a flat file database used. It would have been easier with a database,
// but this still proves the concept of a forgot password
error_reporting(0);
$user['dp'] = "";
$user['email'] = "";
//$user['text'] = $text;
//$user['username'] = $username;
$user['logged_in'] = true;

$file_content = file_get_contents('users.json');
$users_db = [];
$users_db = json_decode($file_content); 
$new_user['email'] = strtolower($_POST['email']);
$new_user['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
$new_user['dp'] = "";
$new_user['text'] = "";
$new_user['username'] = "";
$new_user['logged_in'] = "";

//validation
$user_exists = false;
foreach ($users_db as $user) { 
    if ($user->email == $new_user['email']){
        $user_exists = true;
        $new_user['name'] = strtolower($user->name); 
        $new_user['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);  
        $new_user['dp'] =  strtolower($user->dp); 
        $new_user['text'] = strtolower($user->text); 
        $new_user['username'] = strtolower($user->username); 
        $new_user['logged_in'] = strtolower($user->logged_in); 

    }
}
if ($user_exists) {
    $users_db[] = $new_user;
    $users_db = json_encode($users_db);
    file_put_contents('users.json', $users_db);
    $data['msg'] = "Password reset successfully";
    echo json_encode($data);


} else {
    $data['msg'] = "user does not exists";
    echo json_encode($data);
}