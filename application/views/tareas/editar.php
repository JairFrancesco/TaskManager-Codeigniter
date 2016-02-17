<form action="tareas/guardar<?= isset($tarea) ? "/$tarea->ID" : "" ?>" method="post" class="form-box" role="form">
    <h2 class="form-signin-heading"><?=$title?></h2>
    
    <label>Id</label>
    <input type="text" name="ID" class="form-control" placeholder="kg, und" <?= isset($tarea) ? "value=\"$tarea->ID\" disabled" : "" ?>>
    
    <br>
    
    <label>Titulo</label>
    <input type="text" name="Titulo" class="form-control" <?= isset($tarea) ? "value=\"$tarea->Titulo\"" : "" ?>>
    
    <br>

    <label>Contenido</label>
    <textarea class="form-control" name="Contenido" rows="3" placeholder="Descripcion de la tarea"> <?= isset($tarea) ? "$tarea->Contenido" : "" ?></textarea>
    <br>

    <div class="form-group">
        <label for="exampleInputFile">Fecha</label>
        <input class="form-control" type="date" name="Fecha" <?= isset($tarea) ? "value=\"$tarea->Fecha\"" : "" ?>>
      </div>

    <div class="row">
        <div class="col-md-8">
            <input type="submit" class="btn btn-lg btn-primary btn-block" value="Guardar">        
        </div>
        <div class="col-md-4">
            <a class="btn btn-lg btn-default btn-block" href="tareas">Cancelar</a>        
        </div>
    </div>
</form>