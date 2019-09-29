<?php
session_start();

use Abraham\TwitterOAuth\TwitterOAuth;

require_once 'Utility.php';
require_once 'twitteroauth/autoload.php';
require_once 'config.php';
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

        $filename = 'db/' . $user_id . '.json';
        if (file_exists($filename)) {
            echo 'old user';
        } else {
            echo 'new user';
            fopen($filename, 'w');
        }
        $_SESSION['name'] = $user_name;
        $_SESSION['dp'] = $user_pic;
        $_SESSION['text'] = $text;
        $_SESSION['username'] = $username;

        console_log($user_info);
    } catch (Exception $e) {
        echo "THERE IS AN ERROR ";
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
