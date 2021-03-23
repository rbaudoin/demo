<?php


//NO FUNCIONA CORRECTAMENTE 
//{"error_description":"The endSession endpoint requires an id_token_hint parameter","error":"bad_request"}
///////////////////////////////////////////////////////////////////////////////////////////////////////////

require 'vendor/autoload.php';



$issuer = 'http://am.demo.com/openam/oauth2/realms/root/realms/Rocio';
$cid = 'user';
$secret = 'iden2006';
$oidc = new Jumbojett\OpenIDConnectClient($issuer, $cid, $secret);

//redireccionamiento
$CONFIG = array ('signout_redirect' => "https://localhost/demo");

// eliminar cookie, cerrar sesion 
$_SESSION = array();
setcookie(session_name(), '', 1);
setcookie(session_name(), false);
unset($_COOKIE[session_name()]);
session_destroy();


// redirect logout
$oidc->signOut($_SESSION['idt'], $CONFIG['signout_redirect']);


exit();
?>
