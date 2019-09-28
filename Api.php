<?php
require_once 'TwitterAPIExchange.php';
require_once 'Utility.php';
require_once 'twitteroauth/autoload.php';

$twitter_api_key = '9Kz1OWfT9ujmhgLCcwFuUFzWE';
$twitter_api_secret_key = 'CYXJTDJUZO56bkV3fupE38Gq1yVGAF86R0zp2ZpFl6xXIux16P';
$google_drive_api_key  = 'AIzaSyBMdOT_naOUTU9JZZfs4XudPBpy5yhVLQQ';
$google_drive_api_secret_key = '898427961975-i77ahdt5ha8vjqstsedrmeo7tr30736o.apps.googleusercontent.com';

$settings = array(
    'oauth_access_token' => "",
    'oauth_access_token_secret' => "",
    'consumer_key' => $twitter_api_key,
    'consumer_secret' => $twitter_api_secret_key
);

$username = 'tobecci';
// $url = 'https://api.twitter.com/1.1/followers/list.json';
$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name=' . $username . '&count=200';
$requestMethod = 'GET';

$twitter = new TwitterAPIExchange($settings);
$twitter->setGetfield($getfield);
$twitter->buildOauth($url, $requestMethod);
$result = $twitter->performRequest();
$result = json_decode($result);
console_log($result);
