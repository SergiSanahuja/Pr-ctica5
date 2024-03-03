<!-- Sergi Sanahuja -->
<html lang="en">
<head>
    <title>Document</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../estils/insert.css">      
</head>
<script src="../javaScript/insert.js"></script>
<body>

 

<div class="form-body">
        <div class="row">
            <div class="form-holder">
                <div class="form-content">
                    <div class="form-items">
                        <h3>Eliminar article</h3>
                       

                        <form action="../controlador/eliminar.php" method="post" class="requires-validation" novalidate>                        
                        
                            <div class="col-md-13">
                                <input type="text" name="id" id="id" placeholder="id">                 

                                <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary" onclick="">Submit</button>
                            </div>
                        

                            <div class="form-button mt-3">
                                <!-- Retornar a la vista usuari login  -->
                                <a href="../vista/login.index.vista.php"><button type="button" >cancel·lar</button></a>
                            </div>

                            <div id="result">

                            </div>


                        </form>
                        <?php 
                            // Cuan es crida el metode POST es crida la funcio eliminar
                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                if(isset($_POST['id'])){
                                    $id = $_POST['id'];
                                    eliminar($id);
                                }else{
                                    echo "<script>alert('No has introduit cap id')</script>";
                                }
                                

                            }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
</body>
</html>