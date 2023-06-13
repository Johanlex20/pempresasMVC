<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>pagina ingreso principal</title>

    <script src="https://kit.fontawesome.com/c613273784.js" crossorigin="anonymous"></script> 

    <link rel="stylesheet" href="/build/css/app.css">  


</head>
<body>
    <main class="contenedor seccion">
        <!-- barra de seleccion perfil admin y barra superior saludo y cerrar sesion -->
        <div class="dashboard"> 
            <?php include_once __DIR__ . '/../includes/templates/sidebarA.php';?>
                <div class="principal"> 
                    <?php include_once __DIR__ . '/../includes/templates/barra.php';?>
                     <?php echo $contenido; ?> <!--trae la informacion de las diferentes vistas -->
                </div>
        </div>
    </main>
    <footer class="footer seccion">  
        <div class="contenedor contenedor-footer">
            <nav class="navegacion-footer">
            <p class="copyright">Todos los derechos Reservados <?php echo date('Y'); ?> &copy;</p>  <!--atualizar fecha automaticamente con el servidor -->
    </footer>
        
        <script src="../build/js/app.js"> </script>
    </body>
</html>