<?php
/********************Sergi Sanahuja******************** */
require_once '../model/model.php';

//eliminar article
function eliminar($id){
   //comprovar que id estigui setejat
    $id = isset($_POST['id'])? $_POST['id'] : null;
    
    if($id == null || $id == ""){
        echo "<script>alert('No has introduit cap id')</script>";

    }else{
        eliminarArticle($id);
        header('Location: ../vista/login.index.vista.php');
    }


}

include_once '../vista/eliminar.vista.php';

?>