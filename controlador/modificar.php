<?php
/********************Sergi Sanahuja******************** */
require_once '../model/model.php';

//modificar article
function modificar(){

    //comprovar que id i article no estiguin buits
    if (isset($_POST['id']) && isset($_POST['article'])) {
        $id = $_POST['id'];
        $article = $_POST['article'];
     
        if ($id == null || $id == "" || $article == null || $article == "") {
            echo "<script>alert('No has introduit cap id o article')</script>";
        } else {
            modificarArticle($id, $article);
            header('Location: ../vista/login.index.vista.php');
        }
    }else{
        echo "<script>alert('No has introduit cap id o article')</script>";
    }



}

include_once '../vista/modificar.vista.php';

?>