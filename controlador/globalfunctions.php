<?php
/**
 * Sergi Sanahuja
 *
 * Funció per iniciar la sessió
 * @param $email string correu de l'Oauth/HybridAyth que es vol loguejar
 * @param $usuari string nom de l'usuari que es vol loguejar
 * @param $pdo objecte de la base de dades
 * @return void Si el Log-in és correcte, inicia la sessió, altrament, redirecciona al login_vista.php amb un error 
    */




function iniciSessioOauth($pdo, $email, $usuari){
    $sql = "SELECT * FROM `usuaris` WHERE `correu` = '$email'";
    $statmet = $pdo->prepare($sql);
    $statmet -> execute();
    $resultat = $statmet->fetchAll();
    foreach($resultat as $fila){
        if($fila['correu'] == $email){            
            header('Location: ../vista/login.vista.php');
        }else{
            registreOauth($pdo, $email, $usuari);           
            
        }
    }

}


   /** Funció per registrar l'usuari amb l'Oauth/HybridAuth
 * @param $pdo objecte de la base de dades
 * @param $email string correu de l'Oauth/HybridAyth que es vol registrar
 * @param $usuari string usuari de l'Oauth/HybridAyth que es vol registrar
 * @return void Si el registre és correcte, redirecciona a login_vista.php amb un missatge avisant que el registre s'ha realitzat guardat a la variable de sessió, altrament, redirecciona al login_vista.php amb un error guardat a la variable de sessió
 * function registreOauth($pdo, $email, $usuari){ 
 * }
*/

function registreOauth($pdo, $email, $user){

    $sql = "SELECT * FROM `usuaris` WHERE `correu` = '$email'";
    $statmet = $pdo->prepare($sql);
    $statmet -> execute();
    $resultat = $statmet->fetchAll();
    foreach($resultat as $fila){
        if($fila['correu'] == $email){
            $_SESSION['email'] = $email;
            $_SESSION['login'] = true;
            $_SESSION['usuari'] = $user;
            header('Location: ../vista/login.index.vista.php?error=Usuari registrat correctament');
        }else{
            header('Location: ../vista/login.vista.php?error=No existeix l\'usuari');
        }
    }

}


function missatge($text){
    echo "<script>alert('$text')</script>";

}

?>