<?php
include "../conexion.php";

$query = "SELECT * FROM producto WHERE estado=1";
$result = mysqli_query($conexion, $query);
if (!$result) {
  die("error de consulta" . mysqli_error($conexion));
}

$json = array();
while ($row = mysqli_fetch_array($result)) {
  if ($row['existencia'] > 5) {
    $estado = '<span class="badge badge-pill badge-success">Stock Disponible</span>';
  } else if ($row['existencia'] < 5 && $row['existencia'] > 0) {
    $estado = '<span class="badge badge-pill badge-warning">Debe Rellenar Stock</span>';
  } else {
    $estado = '<span class="badge badge-pill badge-danger">Sin Stock</span>';
  }
  $json[] = array(
    'codproducto' => $row['codproducto'],
    'codigo' => $row['codigo'],
    'descripcion' => $row['descripcion'],
    'precio' => $row['precio'],
    'existencia' => $row['existencia'],
    'estado' => $estado
  );
}
$jsonString = json_encode($json);
echo $jsonString;
