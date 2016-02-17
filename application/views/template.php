<?php
    $this->load->helper('url');
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <title><?php print $title; ?></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <base href="<?php print base_url(); ?>">
    <!-- Bootstrap -->
    <link href="css/bootstrap.min.css" rel="stylesheet" media="screen">
    <link href="css/bootstrap-theme.css" rel="stylesheet" media="screen">
    
    <!-- jQuery  -->
	<script src="js/jquery-1.11.1.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<script src="js/script.js"></script>
  </head>
  <body>
    <div class="container">
        <nav class="navbar navbar-default">
            <ul class="nav navbar-nav">
                <li<?= substr_count($title,"Almacen") > 0 ? ' class="active"' : '' ?>><a href="."><span class="glyphicon glyphicon-home"></span></a></li>
                <li<?= substr_count($title,"Unidad") > 0 ? ' class="active"' : '' ?>><a href="tareas/tareasdehoy">Tareas de Hoy</a></li>
                <li<?= substr_count($title,"Categoría") > 0 ? ' class="active"' : '' ?>><a href="tareas/tareasPendientes">Tareas Pendientes</a></li>
            </ul>
        </nav>   
        <?php print $content; ?>
    </div>
</body>
</html>