<?php
require 'vendor/autoload.php';
 
$issuer = 'http://am.demo.com/openam/oauth2/realms/root/realms/Rocio';
$cid = 'user';
$secret = 'iden2006';

$oidc = new Jumbojett\OpenIDConnectClient($issuer, $cid, $secret);
 
$oidc->authenticate();
 $oidc->addScope('openid','profile', 'email');

$requestUserInfo= $oidc->requestUserInfo(null);
$name= $oidc->requestUserInfo('sub');
$email = $oidc->requestUserInfo('email');
$accesstoken=$oidc->getAccessToken();
$refreshtoken=$oidc->getRefreshToken();
$idtoken=$oidc->getIdToken();

$session = array();
    foreach($oidc->requestUserInfo() as $key=> $value){
        if(is_array($value)){
            $v = implode(', ', $value);
        }else{
            $v = $value;
        }
        $session[$key] = $v;
    }

echo "#name:".PHP_EOL;
echo $name;
echo "<br>";
echo "<br>";
echo "#email:".PHP_EOL;
echo "<br>";
echo $email;
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
echo serialize($requestUserInfo);
echo "<br>";
echo "<br>";
echo "#UserInfo (foreach):".PHP_EOL;
echo "<br>";
echo implode($session);
echo "<br>";
echo "<br>";




?>

<a href="logout.php">
click here to log out</a>






