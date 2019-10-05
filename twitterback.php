<?php
session_start();
require_once 'Utility.php';
require_once 'config.php';
require "vendor/autoload.php";

use Abraham\TwitterOAuth\TwitterOAuth;

echo "started";
if ($_GET['oauth_token'] || $_GET['oauth_verifier']) {

    try {
        $connection = new TwitterOAuth($twitter_api_key, $twitter_api_secret_key, $_SESSION['oauth_token'], $_SESSION['oauth_token_secret']);
        $access_token = $connection->oauth('oauth/access_token', array('oauth_verifier' => $_REQUEST['oauth_verifier'], 'oauth_token' => $_GET['oauth_token']));
        $connection = new TwitterOAuth($twitter_api_key, $twitter_api_secret_key, $access_token['oauth_token'], $access_token['oauth_token_secret']);

        $user_info = $connection->get('account/verify_credentials');

        $oauth_token = $access_token['oauth_token'];
        $oauth_token_secret = $access_token['oauth_token_secret'];

        $user_id = $user_info->id;
        $user_name = $user_info->name;
        $user_pic = $user_info->profile_image_url_https;
        $text = $user_info->status->text;
        $username = $user_info->screen_name;

        $filename = 'db/' . $username . '.json';
        if (file_exists($filename)) {
            $_SESSION['name'] = $user_name;
            $_SESSION['dp'] = $user_pic;
            $_SESSION['text'] = $text;
            $_SESSION['username'] = $username;
            $_SESSION['logged_in'] = true;
        } else {
            $file = file_put_contents($filename, '');
            // fwrite($file, '[]');
            $_SESSION['name'] = $user_name;
            $_SESSION['dp'] = $user_pic;
            $_SESSION['text'] = $text;
            $_SESSION['username'] = $username;
            $_SESSION['logged_in'] = true;
        }
        // console_log($user_info);
        header('Location: dashboard.php');
        // echo "done";
    } catch (Exception $e) {
        header('Location: signin.php?msg=twitter sign in error');
        // echo "ERROR: " . $e->getMessage();
    }
}

    // $sql = "SELECT uid FROM users WHERE oauth_provider = 'twitter' and oauth_id = $user_id";
    // $result = mysqli_query($db, $sql);
    // $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

//     if (mysqli_num_rows($result) == 1) {
//         $query = mysqli_query($db, "UPDATE users SET oauth_token = '$oauth_token', oauth_secret_token = '$oauth_token_secret' WHERE oauth_provider = 'twitter' and oauth_id = $user_id");

//         if ($query) {
//             $_SESSION['name'] = $user_name;
//             $_SESSION['dp'] = $user_pic;
//             $_SESSION['text'] = $text;
//             $_SESSION['username'] = $username;

//             header('Location: index.php');
//         } else {
//             echo mysqli_error($db);
//         }
//     } else {
//         $query = mysqli_query($db, "INSERT INTO users (oauth_id, oauth_provider, oauth_token, oauth_secret_token, oauth_name) VALUES ($user_id, 'twitter', '$oauth_token', '$oauth_token_secret', '$user_name')");

//         if ($query) {
//             $_SESSION['username'] = $username;
//             $_SESSION['text'] = $text;
//             $_SESSION['name'] = $user_name;
//             $_SESSION['dp'] = $user_pic;
//             header('Location: index.php');
//         } else {
//             echo mysqli_error($db);
//         }
//     }
// } else {
//     header('Location: twitterLogin.php');
// }
