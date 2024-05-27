<?php

include('db.php');
$nombre = $_POST['nombre'];
$cedula = $_POST['cedula'];
$correo = $_POST['correo'];
$saldo = $_POST['saldo'];
$query = "INSERT INTO usuarios(nombre, cedula, correo, saldo)
                 VALUES ('$nombre', '$cedula', '$correo','$saldo')";
$verificar_correo = mysqli_query($conexion, "SELECT*FROM usuarios WHERE correo ='$correo'");
if (mysqli_num_rows($verificar_correo) > 0) {
    echo '
    <script>
    alert("Este correo ya está registrado, intenta con otro diferente");
    window.location="NuevoCliente.php";
    </script>
    ';
    exit();
}
$verificar_cedula = mysqli_query($conexion, "SELECT*FROM usuarios WHERE cedula ='$cedula'");
if (mysqli_num_rows($verificar_cedula) > 0) {
    echo '
    <script>
    alert("Esta cedula ya está registrada, intenta con otra diferente");
    window.location="NuevoCliente.php";
    </script>
    ';
    exit();
}
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
