<?php
DEFINE("FACEBOOK_APP_ID", "1234567890");
DEFINE("FACEBOOK_APP_SECRET", "abcd1234efgh8910");
include('OAuth.php');
include('Facebook.class.php');
include('functions.php');
 
$url = "https://graph.facebook.com/me";
$token = "ABC"; // Your stored Access Token for this user
$result = makeRequest($token, $url, "GET");
 
// Convert JSON result to array
$data = json_decode($result);
 
// Print data to screen
print_r($data);