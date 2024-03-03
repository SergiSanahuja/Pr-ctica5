<?php 
/*****************Sergi Sanahuja*******************/
    session_start();

  
require '../model/model.php';


// Ens connectem a la base de dades	
try{
    $conection = connection();  

    
    
// Establim el numero de pagina en la que l'usuari es troba.
# si no troba cap valor, assignem la pagina 1.
//Constante con el número de resultados por página: 3    
    $paginaActual = isset($_REQUEST['pagina']) ? (int) $_REQUEST['pagina'] : 1; 
    

// definim quants post per pagina volem carregar.
# Si no troba cap valor, assignem 5 posts per pagina.
    
   $_POSTSperPagina = isset($_POST['numArticles']) ? (int)$_POST['numArticles'] : 5;

// Revisem des de quin article anem a carregar, depenent de la pagina on es trobi l'usuari.
# Comprovem si la pagina en la que es troba es més gran d'1, sino carreguem des de l'article 0.
# Si la pagina es més gran que 1, farem un càlcul per saber des de quin post carreguem
    
if($paginaActual > 1){
    $inici = ($paginaActual * $_POSTSperPagina - $_POSTSperPagina);
}else{
    $inici = 0;
}

// Preparem la consulta SQL


    $resultat = select($conection);

    $llista = "";

    if ( isset($_SESSION['login'])  && $_SESSION['login'] == true){
        foreach($resultat as $fila){
            if($fila['Id'] > $inici && $fila['Id'] <= $inici + $_POSTSperPagina){
                $llista .= "<li>". $fila['Id'] . " - " . $fila['Article'] ."<a href='../vista/eliminar.vista.php' ><button type='button' class='btn'><i class='fa fa-trash'></i></button></a> <a href='../vista/modificar.vista.php' ><button type='button' class='btn'><i class='fa fa-refresh'></i></button></a></li> ";
            }else{
                $llista .= "";
            }
        }
        
    }else{
        foreach($resultat as $fila){
                if($fila['Id'] > $inici && $fila['Id'] <= $inici + $_POSTSperPagina){
                    $llista .= "<li>". $fila['Id'] . " - " . $fila['Article'] ."</li>";

                }else{
                    $llista .= "";
                }
        }
    }
    

  // Temsps de sessio per a l'usuari loguejat
    if( isset($_SESSION['login']) && $_SESSION['login'] == true){

        $inactividad = 3600;

        if(isset($_SESSION["timeout"])){
            // Calcular el tiempo de vida de la sesión (TTL = Time To Live)
            $sessionTTL = time() - $_SESSION["timeout"];
            if($sessionTTL > $inactividad){
                session_unset();
                session_destroy();
                header("Location: ../vista/index.php");
            }
        }
       
        $_SESSION["timeout"] = time();;
    }
     
  
// Comprovem que hagui articles, en cas contrari, rediriguim
   
    if(!$llista && isset($_SESSION['login'])  && $_SESSION['login'] == true){


        header('Location: login.index.php?pagina=1');
    }else
    if(!$llista){
        header('Location: index.php?pagina=1');
    }

// Calculem el total d'articles per a poder conèixer el número de pàgines de la paginació
    $totalArticles = totalArticles($conection);


// Calculem el numero de pagines que tindrà la paginació. Llavors hem de dividir el total d'articles entre els POSTS per pagina
    $numeroPagines = ceil($totalArticles / $_POSTSperPagina);

// Comprovem que la pagina en la que es troba l'usuari no sigui més gran que el numero de pagines que tenim.
# Si es més gran, rediriguim a la pagina 1.
    //numeraciío de la paginació per quan l'usuari no està loguejat

    $li = button($paginaActual, $numeroPagines);      
    //numeraciío de la paginació per quan l'usuari està loguejat

    $buttonLogin = button_login($paginaActual, $numeroPagines);
    

}catch(PDOException $e){
    echo "Error: " . $e->getMessage();
    die();
}

//comprova que al fer click a la pagina no sigui més gran que el numero de pagines que tenim.
function comprovarPagina($paginaActual, $numeroPagines){
    if(isset($_SESSION['login'])  && $_SESSION['login'] == true){
        if($paginaActual > $numeroPagines || $paginaActual < 1){
            header('Location: login.index.vista.php?pagina=1');
        }
    }else{
        if($paginaActual > $numeroPagines || $paginaActual < 1){
            header('Location: index.php?pagina=1');
        }
    }
   
}

// Funcio que posa els botons de la paginació 
function button($paginaActual, $numeroPagines){
    $li = "";    
    
    for($i = 1; $i <= $numeroPagines; $i++){
        if($paginaActual == $i){
            $li .= "<li class='active'><a href='index.php?pagina=$i'>$i</a></li>";
        }else{
            $li .= "<li><a href='index.php?pagina=$i'>$i</a></li>";
        }
    }
    

    return $li;

}

//funció que posa els botons de la paginació quan l'usuari està loguejat
function button_login($paginaActual, $numeroPagines){
    $li = "";    
    
    for($i = 1; $i <= $numeroPagines; $i++){
        if($paginaActual == $i){
            $li .= "<li class='active'><a href='login.index.vista.php?pagina=$i'>$i</a></li>";
        }else{
            $li .= "<li><a href='login.index.vista.php?pagina=$i'>$i</a></li>";
        }
    }
    

    return $li;

}

//include_once '../vista/index.vista.php';


?>