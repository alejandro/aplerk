<?php
//Code originated in: http://developers.facebook.com/docs/guides/web
//Modification by Codex-m at http://www.php-developer.org/ to create a ready made PHP application for Facebook API
//All the developer needs to do is to input the Application ID, Secret Apps key and customization according to the website needs.
//License: Open source
//For documentation refer to www.devshed.com tutorial series on Facebook API: http://www.devshed.com/c/a/PHP/Facebook-PHP-API-Applications-Basic-Introduction/ (part 1 and part 2)

define('FACEBOOK_APP_ID', '207843222577966');
define('FACEBOOK_SECRET', '7f185b8412765bb0a7f3e8153892425f');
function get_facebook_cookie($app_id, $application_secret) {
  $args = array();
  parse_str(trim($_COOKIE['fbs_' . $app_id], '\\"'), $args);
  ksort($args);
  $payload = '';
  foreach ($args as $key => $value) {
    if ($key != 'sig') {
      $payload .= $key . '=' . $value;
    }
  }
  if (md5($payload . $application_secret) != $args['sig']) {
    return null;
  }
  return $args;
}
$cookie = get_facebook_cookie(FACEBOOK_APP_ID, FACEBOOK_SECRET);
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml"
      xmlns:fb="http://www.facebook.com/2008/fbml">
<body>
<?php if ($cookie) {
//cookie is set, user is logged in
$user = json_decode(file_get_contents('https://graph.facebook.com/'.$cookie['uid']));
//Display the facebook user ID, name, gender and Facebook URL in the web browser
echo '<br />';
echo 'Your Facebook ID: '.$user->{'id'};
echo '<br />';
echo 'Your name: '.$user->{'name'};
echo '<br />';
echo 'Your gender: '.$user->{'gender'};
echo '<br />';
echo 'Your Facebook URL: '.$user->{'link'};
echo '<br />';
echo '<fb:login-button autologoutlink="true"></fb:login-button>';
}
else
{
//user is not logged in, display the Facebook login button
echo '<h2>Facebook Application Test page</h2>';
echo '<br />';
echo 'This is the most basic Facebook application PHP source code that will grab the user Facebook full name, gender and Facebook URL.';
echo '<br />Then displays those information in the web browser once the user has successfully logged in';
echo '<br /><br />';
echo '<fb:login-button autologoutlink="true"></fb:login-button>';
}
?>
<div id="fb-root"></div>
<script src="http://connect.facebook.net/en_US/all.js"></script>
<script>
FB.init({appId: '<?= FACEBOOK_APP_ID ?>', status: true,
cookie: true, xfbml: true});
FB.Event.subscribe('auth.login', function(response) {
window.location.reload();
});
</script>
</body>
</html>