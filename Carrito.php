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

    <main class="site-main-carrito contenedor">
        <div class="space-between">
            <div class="lista-productos-carrito">
                <h1>Carrito de compra</h1>
                <hr class="hr-carrito">
                <?php
                    $ArregloPrecio = array();
                    $ArregloCantidad = array();
                    $Total = 0;
                    $ArregloID_Producto = array();
                    $servidor = "localhost";
                    $nombreusuario = "root";
                    $password= "";
                    $db ="magiccomponentsdb";
                    $usuario = $_SESSION['User'];
                    $conexion = new mysqli($servidor,$nombreusuario,$password,$db);
                
                    if($conexion->connect_error) {
                        die("Conexión fallida: " . $conexion ->connect_error);
                    }

                    $sql = "SELECT * FROM pedido where ID_comprador = '$usuario'";
                    $resultado = $conexion->query($sql);
                    

                    if($resultado->num_rows > 0)
                    {
                        while($row=$resultado->fetch_assoc())
                        {
                            array_push ($ArregloID_Producto, $row["ID_producto"]);
                            array_push ($ArregloCantidad, $row["Cantidad"]);
                            array_push ($ArregloPrecio, $row["Total"]);
                        }   
                    }
                    else
                    {
                        echo '<h4 class="sin-productos">Carrito sin Productos</h4>';
                    }
                    $conexion->close();
                    $i=0;
                    while ($i < count ($ArregloID_Producto))
                    {
                        if($ArregloID_Producto[$i] == '1345')
                        {
                            $Total += $ArregloPrecio[$i];
                        echo '
                            <div class="contenedor-productos-carrito">
                                <a href="ProductoMouse.html"><img src="img/mouse.png"></a>
                                <div class="contenedor-descripcion-producto">
                                    <p>Mouse Logitech g203 RGB</p>
                                    <p>Cantidad: '.$ArregloCantidad[$i].'</p>
                                    <p>Total: $'.number_format($ArregloPrecio[$i], 0, '.', ',').'</p>
                                </div> 
                            </div>
                            <div class="alinear-boton-eliminar">
                            <form action="eliminar.php" method="POST">
                                <input type="hidden" value="'.$ArregloID_Producto[$i].'" name="ProductoaEliminar">
                                <input class="boton boton-azul boton-eliminar" type="submit" value="Eliminar">
                            </form>
                            </div><hr class="hr-carrito">';
                        }

                        if($ArregloID_Producto[$i] == '1547')
                        {
                            $Total += $ArregloPrecio[$i];
                        echo '
                            <div class="contenedor-productos-carrito">
                                <a href="ProductoProcesador.html"><img src="img/procesador.png"></a>
                                <div class="contenedor-descripcion-producto">
                                    <p>Intel Core I9</p>
                                    <p>Cantidad: '.$ArregloCantidad[$i].'</p>
                                    <p>Total: $'.number_format($ArregloPrecio[$i], 0, '.', ',').'</p>
                                </div> 
                            </div><div class="alinear-boton-eliminar">
                            <form action="eliminar.php" method="POST">
                                <input type="hidden" value="'.$ArregloID_Producto[$i].'" name="ProductoaEliminar">
                                <input class="boton boton-azul boton-eliminar" type="submit" value="Eliminar">
                            </form>
                            </div><hr class="hr-carrito">';
                        }

                        if($ArregloID_Producto[$i] == '4539')
                        {
                            $Total += $ArregloPrecio[$i];
                        echo '
                            <div class="contenedor-productos-carrito">
                                <a href="ProductoMonitor.html"><img src="img/monitor.png"></a>
                                <div class="contenedor-descripcion-producto">
                                    <p>Monitor Gigabyte 4K</p>
                                    <p>Cantidad: '.$ArregloCantidad[$i].'</p>
                                    <p>Total: $'.number_format($ArregloPrecio[$i], 0, '.', ',').'</p>
                                </div> 
                            </div><div class="alinear-boton-eliminar">
                            <form action="eliminar.php" method="POST">
                                <input type="hidden" value="'.$ArregloID_Producto[$i].'" name="ProductoaEliminar">
                                <input class="boton boton-azul boton-eliminar" type="submit" value="Eliminar">
                            </form>
                            </div><hr class="hr-carrito">';
                        }

                        if($ArregloID_Producto[$i] == '7812')
                        {
                            $Total += $ArregloPrecio[$i];
                        echo '
                            <div class="contenedor-productos-carrito">
                                <a href="ProductoSSD.html"><img src="img/ssd.png"></a>
                                <div class="contenedor-descripcion-producto">
                                    <p>Disco Duro de estado solido SanDisk</p>
                                    <p>Cantidad: '.$ArregloCantidad[$i].'</p>
                                    <p>Total: $'.number_format($ArregloPrecio[$i], 0, '.', ',').'</p>
                                </div> 
                            </div><div class="alinear-boton-eliminar">
                            <form action="eliminar.php" method="POST">
                                <input type="hidden" value="'.$ArregloID_Producto[$i].'" name="ProductoaEliminar">
                                <input class="boton boton-azul boton-eliminar" type="submit" value="Eliminar">
                            </form>
                            </div><hr class="hr-carrito">';
                        }

                        if($ArregloID_Producto[$i] == '9414')
                        {
                            $Total += $ArregloPrecio[$i];
                        echo '
                            <div class="contenedor-productos-carrito">
                                <a href="ProductoTeclado.html"><img src="img/teclado.png"></a>
                                <div class="contenedor-descripcion-producto">
                                    <p>Teclado Mecánico Hyper X</p>
                                    <p>Cantidad: '.$ArregloCantidad[$i].'</p>
                                    <p>Total: $'.number_format($ArregloPrecio[$i], 0, '.', ',').'</p>
                                </div> 
                            </div><div class="alinear-boton-eliminar">
                            <form action="eliminar.php" method="POST">
                                <input type="hidden" value="'.$ArregloID_Producto[$i].'" name="ProductoaEliminar">
                                <input class="boton boton-azul boton-eliminar" type="submit" value="Eliminar">
                            </form>
                            </div><hr class="hr-carrito">';
                        }

                        if($ArregloID_Producto[$i] == '9471')
                        {
                            $Total += $ArregloPrecio[$i];
                        echo '
                            <div class="contenedor-productos-carrito">
                                <a href="ProductoAudifonos.html"><img src="img/audifonos.png"></a>
                                <div class="contenedor-descripcion-producto">
                                    <p>Headset Hyper X Cloud</p>
                                    <p>Cantidad: '.$ArregloCantidad[$i].'</p>
                                    <p>Total: $'.number_format($ArregloPrecio[$i], 0, '.', ',').'</p>
                                </div> 
                            </div><div class="alinear-boton-eliminar">
                            <form action="eliminar.php" method="POST">
                                <input type="hidden" value="'.$ArregloID_Producto[$i].'" name="ProductoaEliminar">
                                <input class="boton boton-azul boton-eliminar" type="submit" value="Eliminar">
                            </form>
                            </div><hr class="hr-carrito">';
                        }
                        $i++;
                    }
                ?>
            </div>
            <div>
                <div class="subtotal">
                    <h4>Subtotal</h4>
                    <?php
                        echo '<p class="precio">$'.number_format($Total, 0, '.', ',').'</p>';
                    ?>
                </div>
                <div class="pagar">
                    <h4>Proceder al Pago</h4>
                    <a href ="Pagar.php" class="boton boton-gris boton-producto">Método de pago</a>
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
function borrar ($ID_Producto, $servidor, $password, $nombreusuario, $db)
{
    $conexion = new mysqli($servidor,$nombreusuario,$password,$db);
                
                    if($conexion->connect_error) {
                        die("Conexión fallida: " . $conexion ->connect_error);
                    }

                     $sql = "DELETE FROM pedido where ID_Producto like ".$ID_Producto;
                     if($conexion->query($sql) == true){
                        echo '<script language="javascript">alert("Se eliminó del carrito");</script>';
                    }
                    else {
                        die("Error al eliminar datos: ". $conexion->error);
                    }
}
?>