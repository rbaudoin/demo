<?php
require 'vendor/autoload.php';

//issuer se encuentra en  /.well-known/openid-configuration, client id, client secret se encuentran en el client oAuth2 del realm 
$issuer = 'http://am.demo.com/openam/oauth2/realms/root/realms/Rocio';
$cid = 'user';
$secret = 'iden2006';
$oidc = new Jumbojett\OpenIDConnectClient($issuer, $cid, $secret);

//agregar los scopes necesarios  
$oidc->addScope(array('openid', 'email', 'profile'));

$oidc->authenticate();


//agregar los valores que se quieren  mostrar en pantalla 
$requestUserInfo= $oidc->requestUserInfo(null);
$given_name= $oidc->requestUserInfo('given_name');
$family_name=$oidc->requestUserInfo('family_name');
$name= $oidc->requestUserInfo('name');
$email = $oidc->requestUserInfo('email');
$sub= $oidc->requestUserInfo('sub');
$accesstoken=$oidc->getAccessToken();
$refreshtoken=$oidc->getRefreshToken();
$idtoken=$oidc->getIdToken();

//bucle foreach para recorrer todos los elementos de requiestUserInfo
$session = array();
    foreach($oidc->requestUserInfo() as $key=> $value){
        if(is_array($value)){
            $v = implode(', ', $value);
        }else{
            $v = $value;
        }
        $session[$key] = $v;
    }
//imprimir en pantalla los valores 
echo "#given_name:".PHP_EOL;
echo $given_name;
echo "<br>";
echo "<br>";
echo "#family_name:".PHP_EOL;
echo $family_name;
echo "<br>";
echo "<br>";
echo "#name:".PHP_EOL;
echo $name;
echo "<br>";
echo "<br>";
echo "#email:".PHP_EOL;
echo $email;
echo "<br>";
echo "<br>";
echo "#sub:".PHP_EOL;
echo $sub;
echo "<br>";
echo "<br>";
echo "#refreshToken:".PHP_EOL;
echo "<br>";
echo $refreshtoken;
echo "<br>";
echo "<br>";
echo "#IdToken:".PHP_EOL;
echo "<br>";
echo $idtoken;
echo "<br>";
echo "<br>";
echo "#accessToken:".PHP_EOL;
echo "<br>";
echo $accesstoken;
echo "<br>";
echo "<br>";
echo "#requestUserInfo(null):".PHP_EOL;
echo "<br>";
//serialize para convertir objetos en string 
echo serialize($requestUserInfo);
echo "<br>";
echo "<br>";
echo "#UserInfo (foreach):".PHP_EOL;
echo "<br>";
//implode para convertir array en string 
echo implode($session);
echo "<br>";
echo "<br>";

/* boton de redireccionamiento a logout */
?>

<a href="logout.php">
click here to log out</a>




