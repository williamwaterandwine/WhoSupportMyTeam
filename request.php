<?php
require('twitteroauth/twitteroauth.php'); // path to twitteroauth library

session_start();

$accesstoken = $_SESSION['oauth_token'];
$twitter = $_SESSION['twitter'];
$query = $_POST["query"];
$request = 'https://api.twitter.com/1.1/search/tweets.json?q='.$query;
$tweets = $twitter->get($request);
echo "lol".$accesstoken.$query.$request;
print_r($tweets);
  ?>