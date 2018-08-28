<?php
  $steamid = $_POST['steamid'];
  setcookie("SteamID", $steamid, time() + 3600);  /* expire in 1 hour */
  header('Location: ./');
  exit;
 ?>
