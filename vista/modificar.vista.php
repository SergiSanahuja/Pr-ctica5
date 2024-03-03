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
                        <h3>Modificar article</h3>
                        
                        <form action="../controlador/modificar.php" method="post" class="requires-validation" novalidate>                        
                        
                            <div class="col-md-13">
                                <div class="col-md-12">
                                    <input type="text" name="id" id="id" placeholder="id">
                                   

                                </div>
                                <textarea name="article" id="article" cols="30" rows="10" placeholder="Text"></textarea>                  

                                <div class="form-button mt-3">
                                <button id="submit" type="submit" class="btn btn-primary" onclick="">Insertar</button>
                            </div>
                        

                            <div class="form-button mt-3">
                                <a href="../vista/login.index.vista.php"><button type="button" >cancel·lar</button></a>
                            </div>

                            <div id="result">

                            </div>


                        </form>
                        <?php 

                            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                                modificar() ;

                            }
                        
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>


    
</body>
</html>