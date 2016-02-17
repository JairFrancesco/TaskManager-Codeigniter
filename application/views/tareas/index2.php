<div class="form-box">
    <h2>{title}</h2>
    
    <br><br>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>ID</th>
            <th>Titulo</th>
            <th>Contenido</th>
            <th>Fecha</th>
            <th>Estado</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php foreach ($tareas as $tarea) {
            echo "<tr>";
            echo "<td class='id'>".$tarea->ID."</td>";
            echo "<td class='titulo'>".$tarea->Titulo."</td>";
            echo "<td class='contenido'>".$tarea->Contenido."</td>";
            echo "<td class='fecha'>".$tarea->Fecha."</td>";
            if ($tarea->Estado == 1 )
            {
                echo "<td class='estado'><input type='checkbox' class='checktarea' checked='checked'></td>";
            }
            else
            {
                echo "<td class='estado'><input type='checkbox' class='checktarea'></td>";
            }
            echo "<td class='cell-actions'>";
            echo "<div class='btn-group'>";
            echo "<a class='btn btn-xs btn-warning' href='tareas/editar/".$tarea->ID."'><span class='glyphicon glyphicon-pencil'></span></a>";
            echo "<a class='btn btn-xs btn-danger' href='tareas/eliminar/".$tarea->ID."'><span class='glyphicon glyphicon-trash'></span></a>";
            echo "</div>";
            echo "</td>";
            echo "</tr>";
        } ?>
        
        </tbody>
    </table>
        <div class="text-center">
        <ul class="pagination">
            <li><a class="page" href="#">&nbsp;</a></li>
        </ul>
    </div>
</div>
<script>
    $(document).ready(function () {

    
    $(".checktarea").change(function(){        
        if(this.checked){
            if (confirm("¿Desea marcar la tarea como realizada?"))
            {
                
                    
            }
         }
     });
});


</script>