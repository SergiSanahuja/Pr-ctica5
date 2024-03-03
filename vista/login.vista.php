<!--  Sergi sanahuja  -->
<!--La vista del formulari de login-->

<?php

//index.php

//Include Configuration File
require_once('../vendor/autoload.php');
require('../controlador/google.php');

$login_button = '';


if(isset($_GET["code"]))
{

 $token = $google_client->fetchAccessTokenWithAuthCode($_GET["code"]);


 if(!isset($token['error']))
 {
 
  $google_client->setAccessToken($token['access_token']);

 
  $_SESSION['access_token'] = $token['access_token'];


  $google_service = new Google\Service\Oauth2($google_client);

 
  $data = $google_service->userinfo->get();

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

//   $data = $google_service->email
  

  if(!empty($data['picture']))
  {
   $_SESSION['user_image'] = $data['picture'];
  }
 }
}


if(!isset($_SESSION['access_token']))
{

 $login_button = '<a href="'.$google_client->createAuthUrl().'">Login With Google</a>';
}

?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registre</title>
    <link rel="stylesheet" href="../estils/registre.css">
    <script src="https://www.google.com/recaptcha/api.js?hl=es" async defer></script>
</head>
<body>

    <h2>
     Login
    </h2>

    <div class="error">
            <?php
            if(isset($_GET['error'])){                
                echo $_GET['error'];
            }
        ?>
    </div>

    <div class="form">

        <form action="../controlador/login.php" method="post">
                
            <input type="email" name="email"> <label for="email">email</label><br>
            <input type="password" name="password"> <label for="password">password</label><br>
            <input type="submit" name="submit" value="login"> 
            <!-- Redirecció a recuperar contrasenya per enviar un correu -->
            <a href="../vista/recuperarContrasenya.vista.php"> <button type="button">He olvidat la contrasenya</button></a>
            <!-- Redirecció a vista usuari anònim  -->
            <a href="../vista/index.php"><button type="button">cancel·lar</button></a> 
            
            <div class="capcha">
                <div class="g-recaptcha" data-sitekey="6LeQdv4oAAAAAJQZv8U35loEEv0cp-LlOYA881_9"></div>                
            </div>
            <div data-v-44be7528="" class="dividerLine"><span data-v-44be7528=""></span> <p data-v-44be7528="">O bien continúa con</p> <span data-v-44be7528=""></span></div>
            
            <div class="panel panel-default">
            <?php
            if($login_button == '')
            {
                // echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
                // echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
                // echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
                // echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
                // echo '<h3><a href="logout.php">Logout</h3></div>';
            
                header("Location: ../vista/login.index.vista.php");
            }
            else
            {
                echo '<div align="center" id="customBtn" class="customGPlusSignIn">
                        <span class="icon"></span>
                        <span class="buttonText">'.$login_button.'</span>
                    </div>';
                
            }
            ?>
            </div>          
        </form>
    </div>
    
    
    
   
</form>
</body>

</html>