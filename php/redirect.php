<?php
require_once '../lib/auth/vendor/autoload.php';
session_start();

// init configuration
$clientID = '977315870031-qv5tpc9q3v32dhkhrpnq9c4lu0nunfis.apps.googleusercontent.com';
$clientSecret = 'v6XniCpMzTyWxxr_NMzi4YW_';
$redirectUri = 'http://lab0sistemasweb.000webhostapp.com/Trabajo%20complementario/php/redirect.php';

// create Client Request to access Google API
$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

// authenticate code from Google OAuth Flow
if (isset($_GET['code'])) {
    $token = $client->fetchAccessTokenWithAuthCode($_GET['code']);
    $client->setAccessToken($token['access_token']);

    // get profile info
    $google_oauth = new Google_Service_Oauth2($client);
    $google_account_info = $google_oauth->userinfo->get();
    $email =  $google_account_info->email;
    $name =  $google_account_info->name;
    $photo = $google_account_info->picture;
    $_SESSION['Autenticado']='SI';
    $_SESSION['Correo']=$email;
    $_SESSION['Foto']=$photo;
    $_SESSION['Tipo']='1';
    echo (' 
                <script type="text/javascript">
                    XMLHttpRequestObjectLogIn = new XMLHttpRequest();
                    XMLHttpRequestObjectLogIn.open("POST", "IncreaseGlobalCounter.php", true);
                    XMLHttpRequestObjectLogIn.send(null);
                 </script>
                 <meta http-equiv="refresh" content="1; URL=Layout.php" />
                 ');

    //header('Location: Layout.php');

    // now you can use this profile info to create account in your website and make user logged in.
} else {
    header('Location: ' . $client->createAuthUrl() . '');
    //echo "<a href='" . $client->createAuthUrl() . "'>Google Login</a>";
}
