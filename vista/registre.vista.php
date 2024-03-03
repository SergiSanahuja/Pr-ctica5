<!--  Sergi sanahuja  -->
<!--La vista del formulari de registre-->


<?php

//index.php

//Include Configuration File
include('../controlador/google.php');

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

 
  if(!empty($data['given_name']))
  {
   $_SESSION['user_first_name'] = $data['given_name'];
  }

  if(!empty($data['family_name']))
  {
   $_SESSION['user_last_name'] = $data['family_name'];
  }

  if(!empty($data['email']))
  {
   $_SESSION['user_email_address'] = $data['email'];
  }

  if(!empty($data['gender']))
  {
   $_SESSION['user_gender'] = $data['gender'];
  }

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
</head>
<body>
    <h2>Registre</h2>
<form action="../controlador/registre.php" method="post">
    <input type="text" name="nom" value="<?php if (isset($_POST['nom'])) { echo htmlentities($_POST['nom']); } ?>"> <label for="nom">nom</label><br>
    <input type="email" name="email" value="<?php if (isset($_POST['email'])) { echo htmlentities($_POST['email']); } ?>"> <label for="email">email</label><br>
    <input type="password" name="password" > <label for="password">password</label><br>
    <input type="submit" value="Registre"> 
    
    <a href="../vista/index.php"><button type="button">cancel·lar</button></a>
    <div class="error">
        <?php
        if(isset($Error['error'])){
            echo "<br>";                
            echo $Error['error'];
        }
    ?>
    </div>

    <div data-v-44be7528="" class="dividerLine"><span data-v-44be7528=""></span> <p data-v-44be7528="">O bien continúa con</p> <span data-v-44be7528=""></span></div>
    
    <div class="panel panel-default">
    <?php
    if($login_button == '')
    {
        echo '<div class="panel-heading">Welcome User</div><div class="panel-body">';
        echo '<img src="'.$_SESSION["user_image"].'" class="img-responsive img-circle img-thumbnail" />';
        echo '<h3><b>Name :</b> '.$_SESSION['user_first_name'].' '.$_SESSION['user_last_name'].'</h3>';
        echo '<h3><b>Email :</b> '.$_SESSION['user_email_address'].'</h3>';
        echo '<h3><a href="logout.php">Logout</h3></div>';
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
</body>
</html>