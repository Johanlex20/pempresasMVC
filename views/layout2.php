<?php  
    //VERIFICA SI LA SESSION ESTA INICIADA SI NO PUES ENVIA A VALIDACION
    if(!isset($_SESSION)){
        session_start();
    }
    $auth = $_SESSION['login'] ?? false;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagina ingreso principal</title>

    <script src="https://kit.fontawesome.com/c613273784.js" crossorigin="anonymous"></script> 

    <link rel="stylesheet" href="/build/css/app.css">  
    <!--<link rel="stylesheet" href="/pempresas/build/css/app.css">     "/pempresas/build/css/app.css">  localhost trabaja el otro trabaja con local3000-->
</head>
<body>
    <header> 
        <section>
            <div class="burbujas">
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
                <div class="burbuja"></div>
            </div>
        </section>

        <div class="contenedor_menu">
            <div class="logo">
                <a href="/"><img src="/build/img/logo-de-Sena-sin-fondo-Blanco.png" alt="logo-Sena"></a>
            </div>
                    <div class="menu">
                        <i class="fa-solid fa-bars" id="boton_minimenu"></i>
                    <div id="mini_menu"></div>
                <nav id="nav">
                     <!-- <img src="/build/img/logo-de-Sena-sin-fondo-Blanco.png" alt="">  -->
                    <ul>
                        <li><a href="/">HOME</a></li>
                        <?php  if ($auth): ?>
                            <li><a href="/admin/admin">Perfil</a></li>
                        <?php endif; ?> 
                        <li><a href="/anuncios">Ofertas</a></li>
                        <li><a href="/hojadevida">hoja de vida</a></li>
                        <li><a href="/nosotros">Contacto</a></li>
                        <!-- <li><a href="/eleccion">Registro</a></li> -->
                        <?php  if (!$auth): ?>
                            <li><a href="/eleccion">Registro</a></li>
                        <?php endif; ?>
                        <?php  if (!$auth): ?>
                            <li><a href="/login">Ingreso</a></li>
                        <?php endif; ?> 
                        <?php  if ($auth): ?>
                            <li><a href="/logout">Cerrar Sesión</a></li>
                        <?php endif; ?>    

                    </ul>
                </nav>
            </div>
        </div>
    </header>
<body>
    <main>
    <?php echo $contenido; ?>
    </main>
    <footer class="footer seccion">  
        <div class="contenedor contenedor-footer">
            <nav class="navegacion-footer">
            <p class="copyright">Todos los derechos Reservados <?php echo date('Y'); ?> &copy;</p>  <!--atualizar fecha automaticamente con el servidor -->
    </footer>
        
        <script src="../build/js/app.js"> </script>
    </body>
</html>