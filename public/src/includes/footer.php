</div>
</main>
<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; Your Website 2020</div>
            <div>
                <a href="#">Privacy Policy</a>
                &middot;
                <a href="#">Terms &amp; Conditions</a>
            </div>
        </div>
    </div>
</footer>
</div>
</div>
<div id="nuevo_pass" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Cambiar contraseña</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form method="post" id="frmPass">
                    <div class="form-group">
                        <label for="actual"><i class="fas fa-key"></i> Contraseña Actual</label>
                        <input id="actual" class="form-control" type="text" name="actual" placeholder="Contraseña actual" required>
                    </div>
                    <div class="form-group">
                        <label for="nueva"><i class="fas fa-key"></i> Contraseña Nueva</label>
                        <input id="nueva" class="form-control" type="text" name="nueva" placeholder="Contraseña nueva" required>
                    </div>
                    <button class="btn btn-primary" type="button" onclick="btnCambiar(event)">Cambiar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<script src="../assets/js/jquery-3.6.0.min.js" crossorigin="anonymous"></script>
<script src="../assets/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="../assets/js/scripts.js"></script>
<script src="../assets/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="../assets/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="../assets/js/sweetalert2.all.min.js"></script>
<script src="../assets/js/jquery-ui/jquery-ui.min.js"></script>
<script src="../assets/js/Chart.bundle.min.js"></script>
<script src="../assets/js/funciones.js"></script>

<script>
    listarTareas();
    //se listara ni bien se cargue la pag
    function listarTareas() {
        $.ajax({
            url: 'inventario-listar.php',
            type: 'GET',
            success: function(response) {
                //console.log(response);
                let tareas = JSON.parse(response);
                //console.log(tareas);
                let template = "";
                tareas.forEach(tarea => {
                    template +=
                        `<tr tarea_codigo="${tarea.codproducto}">
                <td>${tarea.codproducto}</td>
            <td>${tarea.codigo}</td>
            <td>${tarea.descripcion}</td>
            <td>${tarea.precio}</td>
            <td>${tarea.existencia}</td>
            <td>${tarea.estado}</td>
            <td>
                <button type="button" class="btn-detalle-producto btn btn-primary" data-toggle="modal" data-target="#Editar_Stock" data_codigo='${tarea.codigo}' data_descripcion='${tarea.descripcion}' data_precio='${tarea.precio}' data_stock='${tarea.stock}'>
                    <i class='fas fa-edit'></i>
                </button>
            </td>
          </tr>`
                $('#tareas').html(template);
                });
            }
        });
    }
</script>
<script>
    $(".btn-detalle-producto").click(async function() {
        let id = $(this).attr('data_codigo');
        let descripcion = $(this).attr('data_descripcion');
        let precio = $(this).attr('data_precio');
        let stock = $(this).attr('data_stock');
        $("#codigo_producto_").val(id);
        $("#codigo_descripcion_").val(descripcion);
        $("#codigo_precio_").val(precio);
        $("#codigo_stock_").val(stock);
        console.log(id, descripcion, precio, stock);
    });
</script>
</body>

</html>