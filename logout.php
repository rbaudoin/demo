<?php

require 'vendor/autoload.php';

$issuer = 'http://am.demo.com/openam/oauth2/realms/root/realms/Rocio';
$cid = 'user';
$secret = 'iden2006';
$oidc = new Jumbojett\OpenIDConnectClient($issuer, $cid, $secret);

$oidc->authenticate();
$oidc->signOut($_SESSION['idt'], $CONFIG['oidc_signout_redirect_target']);

session_start();
session_unset();
session_destroy();
 
header("location:index.php");

exit();
?>