<?php    
/********************Sergi Sanahuja******************** */
    session_start();
    require_once '../model/model.php';
    include_once '../vista/login.vista.php';
      
   
    if( isset($_SESSION['intentos'])){
        $_SESSION['intentos'] = $_SESSION['intentos'] + 1;
    } else {
        $_SESSION['intentos'] = 1;
    }

    function cancel(){
        header('Location: ../vista/index.php');
    }
    
    
    /*************************ReCAPCHA************************** */

    if(isset($_POST["submit"])){
        $ip = $_SERVER['REMOTE_ADDR'];
        $captcha = $_POST['g-recaptcha-response'];
        $secretkey = "6LeQdv4oAAAAAK1gj6GZn-w4DA9Fb9xAMTDuqsrv";
        $respuesta = file_get_contents("https://www.google.com/recaptcha/api/siteverify?secret=$secretkey&response=$captcha&remoteip=$ip");
        $atributos = json_decode($respuesta,TRUE);
       
        if(!$atributos['success']){
            header('Location: ../vista/login.vista.php?error=Has de fer el recaptcha');
            exit();
        }
             
        
            if(isset($_POST['email']) && isset($_POST['password'])){
                
                $email = $_POST['email'];
                $password = $_POST['password'];      
                
                
                
                //Comprovar si l'usuari existeiex y si la contrasenya es correcte
                if( comprovarUsuari($email, $password) ){
                    
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;
                    $_SESSION['login'] = true;
                    //$_SESSION['email'] = $email;
                    header('Location: ../vista/login.index.vista.php');
                    
                }else{
                    
                    if($_SESSION['intentos'] >= 3){
                    echo "<script>alert('Has superat el numero d\'intents')</script>";
                    session_destroy();
                    header('Location: ../vista/index.php');
                    
                }else{
                    echo "<script>alert('Usuari o contrasenya incorrecte ')</script>";
                    
                    echo "<script>alert('Tens ". $_SESSION['intentos']." intents')</script>";
                }
                
                
            }
        
        
    }

     


    
}
    
    
    

    



?>