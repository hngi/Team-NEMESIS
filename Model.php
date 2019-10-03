<?php
require_once 'Utility.php';
require_once 'TwitterAPIExchange.php';


class Model
{

    function __construct()
    {
        $this->twitter_api_key = '9Kz1OWfT9ujmhgLCcwFuUFzWE';
        $this->twitter_api_secret_key = 'CYXJTDJUZO56bkV3fupE38Gq1yVGAF86R0zp2ZpFl6xXIux16P';
    }

    function store_tweets()
    {

        $filename = 'db/' . $_SESSION['username'] . '.json';

        $settings = array(
            'oauth_access_token' => "",
            'oauth_access_token_secret' => "",
            'consumer_key' => $this->twitter_api_key,
            'consumer_secret' => $this->twitter_api_secret_key
        );

        $username = $_SESSION['username'];
        $url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
        $getfield = '?screen_name=' . $username . '&count=10';
        $requestMethod = 'GET';

        $twitter = new TwitterAPIExchange($settings);
        $twitter->setGetfield($getfield);
        $twitter->buildOauth($url, $requestMethod);
        $result = $twitter->performRequest();
        $result = json_decode($result);
        // console_log($result);

        $tweets_db = json_decode(file_get_contents($filename));
        // console_log($tweets_db);

        foreach ($result as $tweet) {
            $tweet_exists = false;
            foreach ($tweets_db as $stored_tweet) {
                if ($stored_tweet->id === $tweet->id) {
                    $tweet_exists = true;
                }
            }

            if ($tweet_exists) {
                // console_log("tweet {$tweet->id} exists");
            } else {
                // console_log("tweet {$tweet->id} does not exist");
                array_push($tweets_db, $tweet);
            }
        }

        file_put_contents($filename, json_encode($tweets_db));
        // console_log($result);
        // console_log($tweets_db);
    }
}
