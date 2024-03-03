<?php
/************************Sergi Sanahuja********************** */
require_once '../model/model.php';
session_start();


function insertar(){

    

    $article = isset($_POST['article'])? $_POST['article'] : null;
    
    if($article == null || $article == ""){
        echo "<script>alert('No has introduit cap article')</script>";

    }else{
        insertarArticle($article);
        header('Location: ../vista/login.index.vista.php');
    }
  
            

}

include_once '../vista/insert.vista.php';
?>