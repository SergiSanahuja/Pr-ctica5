<?php      
/**
 * Sergi Sanahuja
 
 */
session_start();
require_once '../model/model.php';



//Comprovem que el formulari s'ha enviat
if (isset($_GET['id'], $_GET['token'])){
    $_SESSION['id'] = $_GET['id'];
    $_SESSION['token'] = $_GET['token'];    
};


//Comprovem que les dades siguin correctes
if(isset($_POST['password1'] , $_POST['password2'])){
    if($_POST['password1'] == $_POST['password2']){
        if (comprovarToken($_SESSION['token'])){   
            $password = $_POST['password1'];
            $password = password_hash($password, PASSWORD_BCRYPT);
            modificarContrasenya($password,$_SESSION['id']);
            
            sleep(3);
            header("Location: ../vista/login.vista.php?error=Contrasenya canviada correctament");
        }else{
            echo "<script>alert('El token no es correcte')</script>";
        }
    }else{
        echo "Les contrasenyes no coincideixen";
    }

}

if(isset($_GET['error'])){
    echo "<br>";                
    echo $_GET['error'];
}


include_once '../vista/canviarContrasenya.vista.php';







?>