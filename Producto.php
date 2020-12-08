<?php
    
    session_start();

    $VarSession = $_SESSION['User'];

    if($VarSession == NULL || $VarSession = ''){
        echo "<script> alert('Usted no tiene una cuenta');</script>";
        header("Location:Login.html");
        die();
    }

    
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-A-Compatible" content="ie=edge">
    <title>Magics Component</title>
    <link href="https://fonts.googleapis.com/css2?family=Goldman&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="css/Normalize.css">
    <link rel="stylesheet" href="css/style.css">
    <link rel="stylesheet" href="css/stylePHP.css">
</head>

<body>
    <header class="site-header">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.html">
                    <img src="img/Logo.svg" alt="Logotipo de la pagina">
                </a>
                <?php echo "Bienvenido: ".$_SESSION['User'] ?>
                <nav id="navegacion" class="navegacion alinear-navegador">
                    <div>
                        <a href="Nosotros.html">Nosotros</a>
                        <a href="Productos.html">Productos</a>
                        <a href="Blog.html">Blog</a>
                        <a href="Contacto.html">Contacto</a>
                        <a href="CerrarSesion.php">Cerrar Sesion</a>
                    </div>
                    <div class="alinear agrupar">
                        <div>
                        <a href="Carrito.php">Carrito de compra</div><div><img class ="carrito"src="img/carrito.png" alt="Carrito de Compra"></div></a>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <main class="site-main">
        <div class="fondo">
        <h2 class="centrar-texto fw-400 barra-producto">Producto agregado al Carrito</h2>
            <div class="contenedor-anuncio-producto contenedor">
                <div class="cantidad-producto">
                    <?php
                    
                    echo
                    '<a href="'.$_POST['url'].'"><img src="'.$_POST['Imagen'].'" alt="Anuncio Mouse RGB"></a>'
                    ?>
               
                </div>
                <div class="contenido-anuncio-producto espacio centrar">
                                <?php
                                $Precio = $_POST['Precio'];
                                $Cantidad = $_POST['Cantidad'];
                                $Total = $Precio * $Cantidad;
                                echo '<p class="fw-700 font-size">Producto: '.$_POST['Producto'].'</p><p class="fw-700 font-size">Cantidad: '.$_POST['Cantidad'].'</p><div class="agrupar"><p class="fw-700 font-size">Costo: <p class="fw-700 font-size precio">$'.number_format($Total, 0, '.', ',').'</p></p></div>';
                                ?>
                </div>
            </div>
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
    $Precio = $_POST['Precio'];
    $Cantidad = $_POST['Cantidad'];
    $Total = $Precio * $Cantidad;
    $ID_Producto = $_POST['IdProducto'];
    $servidor = "localhost";
    $nombreusuario = "root";
    $password= "";
    $db ="magiccomponentsdb";
    $usuario = $_SESSION['User'];

    $conexion = new mysqli($servidor,$nombreusuario,$password,$db);

    if($conexion->connect_error) {
        die("Conexión fallida: " . $conexion ->connect_error);
    }

    if(isset($ID_Producto)){
        $sql = "INSERT INTO pedido(ID_comprador,ID_Producto,Cantidad,Total)
                VALUES('$usuario','$ID_Producto',$Cantidad,$Total)";

        if($conexion->query($sql) == true){
            //echo '<div><form action=""><input type ="checkbox">'.$texto.'</form></div>';
        }
        else {
            $sql ="UPDATE pedido set Cantidad = pedido.Cantidad + $Cantidad, Total = pedido.Total + $Total where ID_Producto like '$ID_Producto'";
            if($conexion->query($sql) == true){
            //echo '<div><form action=""><input type ="checkbox">'.$texto.'</form></div>';
            }
            else {
                die("Error al insertar datos: ". $conexion->error);

            }
        }
    }   
?>