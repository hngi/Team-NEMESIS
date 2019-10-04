<?php
$user['name'] = $_POST['name'];
$user['dp'] = "";
$user['email'] = "";
$user['text'] = $text;
$user['username'] = $username;
$user['logged_in'] = true;

$file_content = file_get_contents('users.json');
$users_db = [];
$users_db = json_decode($file_content);
$new_user['name'] = strtolower($_POST['name']);
$new_user['email'] = strtolower($_POST['email']);
$new_user['password'] = password_hash($_POST['password'], PASSWORD_DEFAULT);
$new_user['dp'] = "";
$new_user['text'] = "";
$new_user['username'] = "";
$new_user['logged_in'] = "";

//validation
$user_exists = false;
foreach ($users_db as $user) {
    if ($user->name == $new_user['name']) $user_exists = true;
    if ($user->email == $new_user['email']) $user_exists = true;
}
if ($user_exists) {
    $data['msg'] = "user exists";
    echo json_encode($data);
} else {
    $users_db[] = $new_user;
    $users_db = json_encode($users_db);
    file_put_contents('users.json', $users_db);
    $data['msg'] = "user registered successful";
    echo json_encode($data);
}
