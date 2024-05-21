<?php

include('db.php');
$nombre = $_POST['nombre'];
$cedula = $_POST['cedula'];
$correo = $_POST['correo'];

$query = "INSERT INTO usuarios(nombre, cedula, correo)
                 VALUES ('$nombre', '$cedula', '$correo')";

$ejecutar = mysqli_query($conexion, $query);

if ($ejecutar) {
    echo '
    <script>
alert("Usuario almacenado exitosamente");
window.location="Sesion.html";
    </script>
    ';
} else {
    echo '
    <script>
alert("Intentalo de nuevo. Usuario no almacenado");
window.location="Sesion.html";
    </script>
    ';
}
mysqli_close($conexion);
