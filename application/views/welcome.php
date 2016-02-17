<div class="form-box" >
    <h2>Gestor de Tareas</h2>

    <form role="form" action="tareas/guardar" class="form-box" role="form" method="post">
      <div class="form-group">
        <label for="exampleInputEmail1">Titulo</label>
        <input type="text" class="form-control" id="exampleInputEmail1" name="Titulo" placeholder="Titulo de la tarea">
      </div>
      <div class="form-group">
        <label for="exampleInputPassword1">Contenido</label>
        <textarea class="form-control" name="Contenido" rows="3" placeholder="Descripcion de la tarea"></textarea>
      <div class="form-group">
        <label for="exampleInputFile">Fecha</label>
        <input class="form-control" type="date" name="Fecha">
        <p class="help-block">Ingrese la fecha en la cual realizar la tarea.</p>
      </div>
      <button type="submit" class="btn btn-info">Agregar Tarea</button>
    </form>
    <br><br>
    <br><br>
    <div class="row">
        <div class="col-md-12">
            <div class="pull-right">
                <form class="form-inline" role="form" id="frmBuscar">
                    <input type="text" class="form-control form-search" id="buscar" placeholder="Buscar...">
                    <button type="submit" class="btn btn-default"><span class="glyphicon glyphicon-search"></span></button>
                </form>
            </div>
        </div>
    </div>
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
            <tr>
                <td class="id">&nbsp;</td>
                <td class="titulo">&nbsp;</td>
                <td class="contenido">&nbsp;</td>
                <td class="fecha">&nbsp;</td>
                <td class="estado"><input type='checkbox' class='checktarea' checked='checked'></td>
                <td class="cell-actions">
                    <div class="btn-group">
                        <a class="btn btn-xs btn-warning" href="tareas/editar/"><span class="glyphicon glyphicon-pencil"></span></a>
                        <a class="btn btn-xs btn-danger" href="tareas/eliminar/"><span class="glyphicon glyphicon-trash"></span></a>
                    </div>
                </td>
            </tr>
        </tbody>
    </table>
    <div class="text-center">
        <ul class="pagination">
            <li><a class="page" href="#">&nbsp;</a></li>
        </ul>
    </div>
</div>
<script>
    
    $(document).ready(function(){

        $nueva_fila = $("table tbody tr:first").clone();
        $boton_pagina = $("ul.pagination li:first").clone();
        
        $.get('tareas/buscar',{'buscar': getUrlVar("buscar"), 'pag': getUrlVar("pag")},CargarLista,'json');
        
        $("#frmBuscar").submit(function(){
            buscar = $(this).find("#buscar").val()
            history.pushState({},null,"tareas?buscar=" + buscar);
            $.get('tareas/buscar',{'buscar': buscar},CargarLista,'json');
            return false;
        });
        
        $(".pagination").delegate(".page", "click", function(e){
            pagina = $(this).text();
            history.pushState({},null,"tareas?buscar=" + getUrlVar("buscar") + "&pag=" + pagina)
            $.get('tareas/buscar',{'buscar': getUrlVar("buscar"), 'pag': pagina},CargarLista,'json');
            e.preventDefault();
        });

    });
    

    CargarLista = function(data){
        $("table>tbody").empty();
        $(data.tareas).each(function(i, tarea) {
            var $fila = $nueva_fila.clone();
            $fila.find(".id").html(tarea.ID);
            $fila.find(".titulo").html(tarea.Titulo);
            $fila.find(".contenido").html(tarea.Contenido);
            $fila.find(".fecha").html(tarea.Fecha);
            if (tarea.Estado == 1)
            {
                $fila.find(".checktarea").prop('checked', true);
            }
            else

            {
                $fila.find(".checktarea").prop('checked', false);
            }
            $fila.find("td.cell-actions .btn-group a.btn").each(function(){ $(this).attr("href", function(i, val){ return val + tarea.ID } ) });
            $fila.appendTo("table>tbody").show();
        });
        Paginar(data.paginas);
    };
    
    Paginar = function(total_paginas) {
        $("ul.pagination").empty();
        pagina_actual = (getUrlVar("pag")=="") ? 1 : getUrlVar("pag"); 
        for(i=1;i<=total_paginas;i++)
        {
            var $pagina = $boton_pagina.clone();
            $pagina.find("a").attr("href", "tareas?pag"+i).html(i);
            if (pagina_actual == i) { $pagina.addClass("active"); }
            $("ul.pagination").append($pagina);
        }
    };


</script>