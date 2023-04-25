<?php include_once "includes/header.php";
include "../conexion.php";
?>
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
    //se listara ni bien se cargue la pag
    function listarTareas() {
        $.ajax({
            url: 'inventario-listar.php',
            type: 'GET',
            success: function(response) {
                console.log(response);
                let tareas = JSON.parse(response);
                console.log(tareas);
                let template = "";
                tareas.forEach(tarea => {
                    template +=
                        `<tr >
            <td>${tarea.codproducto}</td>
            <td>${tarea.codigo}</td>
            <td>${tarea.descripcion}</td>
            <td>${tarea.precio}</td>
            <td>${tarea.existencia}</td>
            <td>${tarea.estado}</td>
            <td>${tarea.estado}</td>
          </tr>`
                    $('#tareas').html(template);
                });
            }
        });
    }
</script>
<h2>Inventario</h2>
<div class="table-responsive">
    <table class="table table-striped table-bordered">
        <thead class="thead-dark">
            <tr>
                <th>#</th>
                <th>Código</th>
                <th>Producto</th>
                <th>Precio</th>
                <th>Stock</th>
                <th>Estado</th>
                <th></th>
            </tr>
        </thead>
        <tbody id="tareas">

        </tbody>
    </table>
</div>
<div id="Editar_Stock" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="my-modal-title">Editar Stock Producto</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="editar_stock.php" method="post">
                    <div class="form-group">
                        <label for="codigo">Código de Barras</label>
                        <input type="text" name="codigo" id="codigo_producto_" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="producto">Producto</label>
                        <input type="text" name="producto" id="codigo_descripcion_" class="form-control" readonly>
                    </div>
                    <div class="form-group">
                        <label for="precio">Precio</label>
                        <input type="text" class="form-control" name="precio" id="codigo_precio_" readonly>
                    </div>
                    <div class="form-group">
                        <label for="cantidad">Cantidad</label>
                        <input type="number" placeholder="Ingrese cantidad" class="form-control" name="cantidad" id="codigo_stock_">
                    </div>
                    <input type="submit" value="Editar Stock" class="btn btn-primary" readonly>
                </form>
            </div>
        </div>
    </div>
</div>

<?php include_once "includes/footer.php";
if (($_SESSION['editar'])) {
    echo "<script>
    Swal.fire(
        'Stock Actualizado!',
        'Se Actualizo Correctamente los productos!',
        'success'
    )
    </script>";
    unset($_SESSION['editar']);
}
?>