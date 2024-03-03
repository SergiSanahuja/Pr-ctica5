<?php
/************************Sergi Sanahuja********************** */
//session_start();
//Funcio que retorna la llista de tots els articles

function connection(){
    try{
        $conection = new PDO('mysql:host=localhost;dbname=pt05_sergi_sanahuja', 'root', '');
        return $conection;
    } catch(Exception $e){
        echo "Error: " . $e->getMessage();
        return false;
        
    }
}

// Selecciona tot de la taula articles
 function select($conection){
    try{
        $sql = "SELECT * FROM `articles`";

        $statmet = $conection->prepare($sql);
        
        // Executem la consulta
        
        $statmet -> execute();
        
        $resultat = $statmet->fetchAll();
        
        return $resultat;        
      
        
    }catch(Exception $e){
        echo "Error: " . $e->getMessage();
        die();
    }
    }

 // retorna el total d'articles
 function totalArticles($conection){

    try{
    $sql = "SELECT * FROM `articles`";

    $statmet = $conection->prepare($sql);
    
    // Executem la consulta
    
    $statmet -> execute();
    
    //rowcount et torna el numero total d'article
    return $statmet->rowCount();   
    }catch(Exception $e){
        echo "Error: " . $e->getMessage();
        die();
    } 
    
 }

 //inserta un usuari a la base de dades
 function insertarUsuari($nom, $email, $password){
    try{
    $conection = connection();
    $sql = "INSERT INTO `usuaris`(`Usuari`, `Contrasenya`, `correu`) VALUES ('$nom', '$password', '$email')";
    $statmet = $conection->prepare($sql);
    $statmet -> execute();
    }catch(Exception $e){
        echo "Error: " . $e->getMessage();
        die();
    }
 }

 //insertar articles a la base de dades
 function insertarArticle($article){

    try{
        $conection = connection();

        //calcula el id del nou article
        $sql = "SELECT `Id` FROM `articles` ORDER BY `Id` DESC LIMIT 1";
        $statmet = $conection->prepare($sql);
        $statmet -> execute();
        $resultat = $statmet->fetchAll();    
        foreach($resultat as $fila){
            $id = $fila['Id'];
        }
        $id++;

        //inserta el nou article
        $sql = "INSERT INTO `articles`(`Id`, `Article`) VALUES ('$id', '$article')";
        $statmet = $conection->prepare($sql);
        $statmet -> execute();
    }catch(Exception $e){
        echo "Error: " . $e->getMessage();
            die();
}
}

//elimina un article de la base de dades
function eliminarArticle($id){
    try{
        $conection = connection();
        $sql = "DELETE FROM `articles` WHERE `Id` = '$id'";
        $statmet = $conection->prepare($sql);
        $statmet -> execute();
    }catch(Exception $e){
        echo "Error: " . $e->getMessage();
        die();
    }
}


//modifica un article de la base de dades
function modificarArticle($id, $article){
    try{
        $conection = connection();
        $sql = "UPDATE `articles` SET `Article`= '$article' WHERE `Id` = '$id'";
        $statmet = $conection->prepare($sql);
        $statmet -> execute();
    }catch(Exception $e){
        echo "Error: " . $e->getMessage();
        die();
    }
}
 
 //comprova que l'usuari i la contrasenya siguin correctes
 function comprovarUsuari($email, $password){
    try{

        $conection = connection();
        
        $sql = "SELECT * FROM `usuaris` WHERE `correu` = '$email'";
        $statmet = $conection->prepare($sql);
        $statmet -> execute();
        $resultat = $statmet->fetchAll();
        foreach($resultat as $fila){
            if($fila['correu'] == $email){
                // if(md5($password) == $fila['Contrasenya']){
                //     return true;
                // }else{
                //     return false;
                // }
                
                return password_verify($password, $fila['Contrasenya']);

            }else{
                throw new Exception("Usuari incorrecte");
                
            }
        }
    } catch(Exception $e){
        echo "Error: " . $e->getMessage();
        return false;
        
    }
}

//comprova que el correu no est
function comprovarCorreu($email){
    $conection = connection();
    $sql = "SELECT * FROM `usuaris` WHERE `correu` = '$email'";
    $statmet = $conection->prepare($sql);
    $statmet -> execute();
    $resultat = $statmet->fetchAll();
    foreach($resultat as $fila){
        if($fila['correu'] == $email){
            return true;
        }else{
            return false;
        }
    }
}

function modificarContrasenya($password , $id){
    try{
        $conection = connection();
        $sql = "UPDATE `usuaris` SET `Contrasenya`= '$password' WHERE `id` = '$id'";
        $statmet = $conection->prepare($sql);
        $statmet -> execute();
    }catch(Exception $e){
        echo "Error: " . $e->getMessage();
        die();
    }
}

 //insertar token 
 function insertarToken($token , $email){
    try{
        $conection = connection();
        $sql = "UPDATE `usuaris` SET `Token`='$token' WHERE correu = '$email'";
        $statmet = $conection->prepare($sql);
        $statmet -> execute();
    }catch(Exception $e){
        echo "Error: " . $e->getMessage();
        die();
    }
 }

 function getId($email){
    try{
        $conection = connection();
        $sql = "SELECT `Id` FROM `usuaris` WHERE `correu` = '$email'";
        $statmet = $conection->prepare($sql);
        $statmet -> execute();
        $resultat = $statmet->fetchAll();
        foreach($resultat as $fila){
            $id = $fila['Id'];
        }
        return $id;
 }
    catch(Exception $e){
        echo "Error: " . $e->getMessage();
        die();
    }
    }

 function comprovarToken($token){
    try{
        $conection = connection();
        $sql = "SELECT * FROM `usuaris` WHERE `token` = '$token'";
        $statmet = $conection->prepare($sql);
        $statmet -> execute();
        $resultat = $statmet->fetchAll();

        foreach($resultat as $fila){
            if($fila['Token'] == $token){
                return true;
            }else{
                return false;
            }
        }

       
    }catch(Exception $e){
        echo "Error: " . $e->getMessage();
        die();
    }
 }


?>