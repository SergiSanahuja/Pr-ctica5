<?php
// Sergi Sanahuja
    $idClient = '721913885421-o0stm2ab6r5tn5av6lekqs8o2068os5j.apps.googleusercontent.com';
    $idSecretClient = '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';


    //start session on web page
    session_start();

    //config.php

    //Include Google Client Library for PHP autoload file
    require_once '../vendor/autoload.php';

    //Make object of Google API Client for call Google API
    
    $_SESSION['login'] = true;

    //Make object of Google API Client for call Google API
    $google_client = new Google_Client();

    //Set the OAuth 2.0 Client ID
    $google_client->setClientId('721913885421-o0stm2ab6r5tn5av6lekqs8o2068os5j.apps.googleusercontent.com');

    //Set the OAuth 2.0 Client Secret key
    $google_client->setClientSecret('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');

    //Set the OAuth 2.0 Redirect URI
    $google_client->setRedirectUri('https://localhost/Backend/Practiques/Practica_05/vista/login.index.vista.php');

    // to get the email and profile 
    $google_client->addScope('email');

    $google_client->addScope('profile');


?>