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
                        <h3>Insertar article</h3>
                        <p>Afageix el teu article.</p>
                        <form action="../controlador/articles.php" method="post" class="requires-validation" novalidate>                        
                        
                            <div class="col-md-13">
                                <textarea name="article" id="article" cols="30" rows="10"></textarea>                  

                                <div class="form-button mt-3">
                                    <!-- insertar article a la BD -->
                                <button id="submit" type="submit" class="btn btn-primary" onclick="">Insertar</button>
                            </div>
                        

                            <div class="form-button mt-3">
                                <!-- Retornar a la vista de usuari login -->
                                <a href="../vista/login.index.vista.php"><button type="button" >cancel·lar</button></a>
                            </div>

                            <div id="result">

                            </div>


                        </form>
                        <?php 

                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                insertar() ;

                            }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
</body>
</html>