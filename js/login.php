<?php
DEFINE("FACEBOOK_APP_ID", "1234567890");
DEFINE("FACEBOOK_APP_SECRET", "abcd1234efgh8910");
include('OAuth.php');
include('Facebook.class.php');
include('functions.php');
 
$callback_url = "http://www.example.com/facebook_callback.php";
$facebook = new Facebook(FACEBOOK_APP_ID, FACEBOOK_APP_SECRET, $callback_url);
$facebook->start();