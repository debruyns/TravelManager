<?php

  require_once('includes/classes/authenticator.class.php');

  $auth = new Authenticator();

  $secret = $auth->generateRandomSecret();
  echo $secret;
  echo "<br /><br />";
  $QR = $auth->getQR('sam@citytakeoff.com', $secret, "TravelManager");

  echo "<img src='{$QR}' />"

?>
