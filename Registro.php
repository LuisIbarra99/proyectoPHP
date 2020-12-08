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
                <nav id="navegacion" class="navegacion alinear-navegador">
                    <div>
                        <a href="Nosotros.html">Nosotros</a>
                        <a href="Productos.html">Productos</a>
                        <a href="Blog.html">Blog</a>
                        <a href="Contacto.html">Contacto</a>
                    </div>
                    <div class="alinear agrupar">
                        <div>
                            <a href="Carrito.php">Carrito de compra
                        </div>
                        <div><img class="carrito" src="img/carrito.png" alt="Carrito de Compra"></div></a>
                    </div>
                </nav>
            </div>
        </div>
    </header>

    <main class="site-main">
        <div class="fondo">
            <div class="contenedor-anuncio-producto contenedor">
                <div class="cantidad-producto">
                    <?php
                        $host = "localhost";
                        $usuario = "root";
                        $pass = "";
                        $dbnom = "magiccomponentsdb";
                        $con = mysqli_connect($host, $usuario, $pass, $dbnom) or die("Hubo un problema al tratar de conectar");
                        mysqli_select_db($con, $dbnom) or die("Error al conectar con la base de datos");

                        $Nombres = $_POST['Nombre'];
                        $Apellidos = $_POST['Apellidos'];
                        $Email = $_POST['Correo'];
                        $Telefono = $_POST['Telefono'];
                        $usua = $_POST['NomUsuario'];
                        $Contraseña = $_POST['Contraseña'];

                        //$Registrado = "SELECT * FROM inicio WHERE usuario = '" .$Nombre. "' AND Contraseña = '".$Contraseña."'";
                        $Nuevo = "INSERT INTO registros(Nombres,Apellidos,Email,Telefono,ID_Registro,Usuario,Contraseña) 
                                    VALUES ('$Nombres','$Apellidos','$Email',$Telefono,NULL,'$usua','$Contraseña')";

                        $query = mysqli_query($con, $Nuevo);
                        if (isset($usua))
                        {
                            if (!$query) {
                                echo '<script>
                                alert("Usuario ya existente, ingrese con un correo y usuario distinto");
                            </script>
                            <a href="Registro.html" class="boton boton-azul"> regresar </a>
                            ';
                            } else {
                                echo "<h2 class='centrar-texto'>Datos Guardados Correctamente</h2> <a href='Login.html' class='boton boton-azul'> regresar </a>";
                            }
                            mysqli_close($con);
                        }
                        else{
                            echo "<script>
                                alert('Ingrese un correo');
                            </script>
                            <a href='Registro.html' class='boton boton-azul'> regresar </a>
                            ";
                        }

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