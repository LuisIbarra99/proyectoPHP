<?php
$host = "localhost";
$usuario = "root";
$pass = "";
$dbnom = "magiccomponentsdb";
$puerto = 3306;

$conex = mysqli_connect($host, $usuario, $pass, $dbnom, $puerto) or die("Hubo un problema al tratar de conectar");
mysqli_select_db($conex, $dbnom) or die("Error al conectar con la base de datos");

$Nombre = $_POST['usuario'];

$Contraseña = $_POST['contraseña'];

session_start();
$_SESSION['User'] = $Nombre;

$Registrado = "SELECT * FROM `registros` WHERE Usuario = '" . $Nombre . "' AND Contraseña = '" . $Contraseña . "'";
//$Nuevo = "INSERT INTO inicio('Usuario','Password') VALUES ('usuario','contraseña')";

$query = mysqli_query($conex, $Registrado);

$filas = mysqli_num_rows($query);

if($filas > 0 && $Nombre == "Admin" && $Contraseña == "0000")
{
    header("Location:Admin.php");
}
else if($filas > 0){
    header("Location:Productos.html");
}else{
    echo "<script>alert ('Crea una cuenta para comprar')</script>";
}

mysqli_free_result($query);

mysqli_close($conex);
?>