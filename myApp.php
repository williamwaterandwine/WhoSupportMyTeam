<html>
<head>
	<title>WhoSupportMyTeam</title>
	<meta charset="utf-8" />

	<meta name="viewport" content="width=device-width, initial-scale=1.0">

	 <link rel="stylesheet" href="css/leaflet.css" />
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
//print_r($tweets);
?>
<h1>WhoSupportMyTeam</h1>
<h2>Geolocalize Tweet about your favorite team</h2>
<div id="map" style="width: 600px; height: 400px"></div>
<script src="js/leaflet.js"
var map = L.map('map').setView([51.505, -0.09], 13);
></script>
</body>

</html>