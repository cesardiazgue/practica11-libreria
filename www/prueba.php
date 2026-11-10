<?php
$conexion = mysqli_connect("db", "usuario", "usuario123", "libreria");

if (!$conexion) {
    die("Error de conexión: " . mysqli_connect_error());
}

echo "Conexión exitosa a la base de datos libreria";
mysqli_close($conexion);
?>