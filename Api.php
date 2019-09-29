<?php

use Abraham\TwitterOAuth\TwitterOAuth;

require_once 'TwitterAPIExchange.php';
require_once 'Utility.php';
require_once 'twitteroauth/autoload.php';
require_once 'config.php';

// $settings = array(
//     'oauth_access_token' => "",
//     'oauth_access_token_secret' => "",
//     'consumer_key' => $twitter_api_key,
//     'consumer_secret' => $twitter_api_secret_key
// );

// $username = 'tobecci';
// $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
// $getfield = '?screen_name=' . $username . '&count=200';
// $requestMethod = 'GET';

// $twitter = new TwitterAPIExchange($settings);
// $twitter->setGetfield($getfield);
// $twitter->buildOauth($url, $requestMethod);
// $result = $twitter->performRequest();
// $result = json_decode($result);
// console_log($result);

session_start();
$connection = new TwitterOAuth($twitter_api_key, $twitter_api_secret_key);
$request_token = $connection->oauth("oauth/request_token", array("oauth_callback" => "http://localhost:8000/twitterback.php"));
$_SESSION['oauth_token'] = $request_token['oauth_token'];
$_SESSION['oauth_token_secret'] = $request_token['oauth_token_secret'];
$url = $connection->url("oauth/authorize", array("oauth_token" => $request_token['oauth_token']));
header('Location: ' . $url);
// http://localhost:8000/signup.php?oauth_token=TA7sKwAAAAABAI6NAAABbXl_az4&oauth_verifier=B1NxPpHu1lkIuTgkVkg8lNJ2iPTNPkpF
// http://localhost:8000/twitterback.php?oauth_token=cfX0XAAAAAABAI6NAAABbXmDCTk&oauth_verifier=PBWwScTDGKgf9YQ7JZHVddJrIwftvFEq
