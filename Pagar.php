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

<body>
    <header class="site-header">
        <div class="contenedor contenido-header">
            <div class="barra">
                <a href="index.html">
                    <img src="img/Logo.svg" alt="Logotipo de la pagina">
                </a>
                <?php echo "Bienvenido: ".$_SESSION['User'] ?>
                <nav id="navegacion" class="navegacion">
                    <a href="Nosotros.html">Nosotros</a>
                    <a href="Productos.html">Productos</a>
                    <a href="Blog.html">Blog</a>
                    <a href="Contacto.html">Contacto</a>
                    <a href="CerrarSesion.php">Cerrar Sesion</a>
                </nav>
            </div>
        </div>
    </header>

        <main class="contenedor seccion-contacto contenido-centrado">
            <h2 class="fw-400 centrar-texto">Ingrese su método de pago</h2>
            
            <form class="contacto" action="">
                <fieldset>
                    <legend>Información Bancaria</legend>
                    <label for="No.Tarjeta">Número de Tarjeta: </label>
                    <input type="text" id="No.tarjeta" placeholder="Tu num. de tarjeta" required>

                    <label for="CCV">CCV: </label>
                    <input type="text" id="CCV" placeholder="CCV" required max=999>

                    <label for="Vencimiento">Fecha de Vencimiento: </label>
                    <input type="date" id="Vencimiento"required>

                    <label for="nombre">Nombre del titular: </label>
                    <input type="text" id="nombre" placeholder="Nombre y Apellidos" required>

                </fieldset>
                <input type="submit" value="Continuar" class="boton boton-azul">
            </form>
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