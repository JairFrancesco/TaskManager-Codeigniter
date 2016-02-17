<?php

//  2.  Verificar que el usuario haya ingresado todos los campos

$errores = "";
if ($_POST['']) {
    $errores .= "<li>Falta ingresar...</li>";
}

//  3.  Crear variables con los valores de $_POST

if(empty($errores)) {
    $var = $_POST[''];
    

//  4.  Escribir los valores en el archivo registros.csv
    
    $archivo = fopen("registros.csv", "a");
    
}

?>
<!DOCTYPE html>
<html>
  <head>
    <title>Registro de Producto</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-theme.css" rel="stylesheet" media="screen">
  </head>
  <body>
    <div class="container">
        <?php
            //  5.  Si el usuario ingresó todos los campos mostrar los valores ingresados
            if(empty()) { 
        ?>
        <!-- cuando el registro es correcto -->
        <div class="panel panel-success">
            <div class="panel-heading">
                <strong>El producto se registro correctamente.</strong>
            </div>
            
            <div class="panel-body">
                
                <label>Nombre del Producto</label>
                <div><?= ?></div>
                
                <br>
                
                <label>Marca</label>
                <div><?= ?></div>
                
                <br>
                
                <label>Tipo de producto</label>
                <div><?= ?></div>
                
                <br>
                
                <label>Unidad de medida</label>
                <div><?= ?></div>
                
                <br>
                
                <label>Código Producto</label>
                <div><?= ?></div>
            
                <br>
                
                <a href="index.php" class="btn btn-lg btn-success btn-block">Registrar otro producto</a>
            </div>
        </div>
        <?php
        //  6.  Si el usuario no ingresó todos los campos mostrar mensaje de error con los campos que faltan
        
        ?>
        <!-- cuando faltan agregar campos -->
        <div class="panel panel-danger">
            <div class="panel-heading">
                <strong>No se puede registrar el producto.</strong>
            </div>
            
            <div class="panel-body">
                
                <ul class="text-danger">
                    <?= ?>
                </ul>
                
                <a href="index.php" class="btn btn-lg btn-danger btn-block">Volver al formulario</a>
            </div>
        </div>
        <?php } ?>
    </div>
</body>
</html>