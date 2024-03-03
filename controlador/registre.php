<?php
    /********************Sergi Sanahuja******************** */
    //session_start();
    require_once '../model/model.php';

    $_SESSION['login'] = true;

    $nom = isset($_POST['nom'])? $_POST['nom'] : null;
    $email = isset($_POST['email'])? $_POST['email'] : null;
    $password = isset($_POST['password'])? $_POST['password'] : null;

    //echo verificar($nom, $email, $password);
    //Comprovem que el formulari s'ha enviat
    if($_SERVER['PHP_SELF']){
        //Comprovem que les dades siguin correctes
            if(verificar($nom, $email, $password)){
                if(comprovarCorreu($email)){
                    $Error['error'] = "El correu ja existeix";

                }else{
                
                    //encriptar password
                   // $password = md5($password);
                    $password = password_hash($password, PASSWORD_BCRYPT);
                
                    //insertar usuari
                    insertarUsuari($nom, $email, $password);
                    
                    $_SESSION['nom'] = $nom;
                    $_SESSION['email'] = $email;
                    $_SESSION['password'] = $password;

                    header("Location: ../vista/login.index.vista.php");
                }
            }else{                
                $Error['error'] = "Error en el registre, revisa les dades
                recorda que el nom només pot contenir lletres, l'email ha de ser correcte i la contrasenya ha de contenir almenys una majúscula, una minúscula, un número i un mínim de 8 caràcters";
               
            }
            //$password = password_hash($password, PASSWORD_DEFAULT);
           
        
    }
    

//Funció per verificar que les dades introduides siguin correctes
    function verificar($nom, $email, $password){
        $n = $e = $p = false;
    
        if(empty($nom) || empty($email) || empty($password) || $nom == null || $email == null || $password == null){
            if (preg_match("/^[a-zA-Z ]*$/",$nom)) {
                $n = true;
            }
           
            if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
                $e = true;
            }
           
            if (preg_match("/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)[a-zA-Z\d]{8,}$/",$password)) {
                $p = true;    
            }     
           
            if($n && $e && $p){
                return true;
            }else{
                    return false;
                }

        }else{
            return true;
        }
       
      
    }

    require_once '../vista/registre.vista.php';
?>