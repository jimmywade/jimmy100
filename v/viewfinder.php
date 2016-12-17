
<?php

$rutaImagen=$_GET['boots'];

?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title> View full scale - I´m Talent </title>
    <link rel="shortcut icon" href="../media/vf.png" type="image/png" />
    <link rel="stylesheet" href="../libs/bootstrap/css/bootstrap.min.css" />
    <link rel="stylesheet" href="../styles.css" />
    <script type="text/javascript" src="../libs/jquery/jquery.min.js"></script>
    <script type="text/javascript" src="../libs/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="../libs/angular/angular.min.js"></script>
    <script type="text/javascript" src="../libs/angular/angular-resource.js"></script>
    <script type="text/javascript" src="../c/controladores_1.js"></script>
</head>
<body style="background-color:#E0EDFA;">



<!-- .................................................................................................................  -->

<div class="container">
    <div class="col-xs-12 col-sm-12 col-md-12  col-sm-offset-0 col-md-offset-0">
        <img style="width:100%;" src="<?php echo $rutaImagen; ?>">    
    </div>
</div>


<!-- ...........................................................................................................  -->

</body>
</html>