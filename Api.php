<?php

use Abraham\TwitterOAuth\TwitterOAuth;

require_once 'TwitterAPIExchange.php';
require_once 'Utility.php';
require_once 'twitteroauth/autoload.php';
require_once 'config.php';

try {
    session_start();
    $connection = new TwitterOAuth($twitter_api_key, $twitter_api_secret_key);
    $request_token = $connection->oauth("oauth/request_token", array("oauth_callback" => "http://localhost:8000/twitterback.php"));
    $_SESSION['oauth_token'] = $request_token['oauth_token'];
    $_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
    $url = $connection->url("oauth/authorize", array("oauth_token" => $request_token['oauth_token']));
    header('Location: ' . $url);
} catch (Exception $e) {
    header('Location: signin.php?msg=twitter sign in error');
}
