<?php
include "includes/footer.php";
include "../conexion.php";
$codigo = $_POST['codigo'];
$cantidad = $_POST['cantidad'];
$sql_update = mysqli_query($conexion, "UPDATE producto SET existencia = $cantidad WHERE codigo = $codigo");
session_start();
$_SESSION['editar'] = "hola";
header("location:inventario.php");
