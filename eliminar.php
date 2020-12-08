<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-A-Compatible" content="ie=edge">
    <title>Magics Component</title>
    <link href="https://fonts.googleapis.com/css2?family=Goldman&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/Normalize.css">
    <link rel="stylesheet" href="css/stylePHP.css">
    <link rel="stylesheet" href="css/style.css">
</head>

<body class="fondo">
    <header class="site-header">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.html">
                    <img src="img/Logo.svg" alt="Logotipo de la pagina">
                </a>
                <nav id="navegacion" class="navegacion alinear-navegador">
                    <div>
                        <a href="Nosotros.html">Nosotros</a>
                        <a href="Productos.html">Productos</a>
                        <a href="Blog.html">Blog</a>
                        <a href="Contacto.html">Contacto</a>
                    </div>
                    <div class="alinear agrupar">
                        <div>
                        <a href="Carrito.php">Carrito de compra</div><div><img class ="carrito"src="img/carrito.png" alt="Carrito de Compra"></div></a>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <main class="site-main-carrito contenedor">
        <div class="centrar-texto-eliminar">
                <h1>Se ha eliminado del carrito</h1>
        </div>
        <div class="centrar-texto-eliminar">
          <a href="carrito.php" class="boton boton-gris">Volver</a>
        </div>

    </main>

    <footer class="site-footer seccion">
        <div class="contenedor contenedor-footer">
            <div class="agrupar">
                <nav class="navegacion">
                    <a href="Nosotros.html">Nosotros</a>
                    <a href="Productos.html">Productos</a>
                    <a href="Blog.html">Blog</a>
                    <a href="Contacto.html">Contacto</a>
                </nav>
                <p class="copyright">Todos los derechos Reservados 2020 &copy;
                </p>
            </div>
            <div class="agrupar fw-400">
                <p>Torreón, Coahuila México</p>
                <p>contacto@magicscomponents.com.mx</p>
                <p>tel: 8714113537</p>
            </div>
        </div>
    </footer>
</body>
</html>

<?php
$ID_Producto = $_POST['ProductoaEliminar'];
$servidor = "localhost";
$nombreusuario = "root";
$password= "";
$db ="magiccomponentsdb";

    $conexion = new mysqli($servidor,$nombreusuario,$password,$db);
                
        if($conexion->connect_error) {
        die("Conexión fallida: " . $conexion ->connect_error);
        }

        $sql = "DELETE FROM pedido where ID_Producto like ".$ID_Producto;
        if($conexion->query($sql) == true){
        }
            else {
                die("Error al eliminar datos: ". $conexion->error);
                }
    $conexion->close();
?>