<html>
<head>
</head>
<body>
<?php
require('twitteroauth/twitteroauth.php'); // path to twitteroauth library

$consumerkey = 'A3AW2X0J7aEFjr9UPQGNRA';
$consumersecret = 'WRVWPF7fa9oFdW2ncSaFTkD6XRQL6GGnGmQRphCR7U';
session_start();

$accesstoken = $_SESSION['oauth_token'];
$accesstokensecret = $_SESSION['oauth_token_secret'];
$twitter = new TwitterOAuth($consumerkey, $consumersecret, $accesstoken, $accesstokensecret);
$credentials = $twitter->getAccessToken($_GET["oauth_verifier"]);
$tweets = $twitter->get('https://api.twitter.com/1.1/search/tweets.json?q=%fourcade');
print_r($tweets);
?>

</body>
</html>