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

  Rechercher : <input type="text" name="query"><br>
  <input type="submit" value="Submit">

<div id="map" style="width: 600px; height: 400px"></div>
<script src="js/leaflet.js"></script>
<script> 
var map = L.map('map').setView([47.48215, -0.56105], 13);
L.tileLayer('http://{s}.tile.cloudmade.com/BC9A493B41014CAABB98F0471D759707/997/256/{z}/{x}/{y}.png', {
			maxZoom: 25,
			attribution: 'Map data &copy; <a href="http://openstreetmap.org">OpenStreetMap</a> contributors, <a href="http://creativecommons.org/licenses/by-sa/2.0/">CC-BY-SA</a>, Imagery © <a href="http://cloudmade.com">CloudMade</a>'
		}).addTo(map);
		function onLocationFound(e) {
			var radius = e.accuracy / 2;

				L.marker(e.latlng).addTo(map)
				.bindPopup("You are within " + radius + " meters from this point").openPopup();

				L.circle(e.latlng, radius).addTo(map);
				console.log(e);
			}
		map.on('locationfound', onLocationFound);
		map.locate({setView: true, maxZoom: 18});
</script>
</body>

</html>