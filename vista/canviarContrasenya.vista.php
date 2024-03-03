<!-- Sergi Sanahuja -->
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="../estils/estils.css">
    <title>Document</title>
</head>
<body>

    <div class="container">
        <h2>Recuperar Contrasenya</h2>
        <div class="row">
            <div class="col-sm-4">
                <form action="../controlador/canviarContrasenya.php" method="post">
                <label>New Password</label>
                <div class="form-group pass_show"> 
                    <input type="password" name="password1" value="faisal.khan@123" class="form-control" placeholder="New Password"> 
                </div> 
                <label>Confirm Password</label>
                <div class="form-group pass_show"> 
                    <input type="password" name="password2" value="faisal.khan@123" class="form-control" placeholder="Confirm Password"> 
                </div> 
                
                <input type="submit" value="Enviar">

                <a href="../vista/login.vista.php"><button type="button">cancel·lar</button></a>
                </form>
                
            </div>  
        </div>
    </div>
</body>
</html>



<!------ Include the above in your HEAD tag ---------->

