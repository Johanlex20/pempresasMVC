
<?php  
    //VERIFICA SI LA SESSION ESTA INICIADA SI NO PUES ENVIA A VALIDACION
    if(!isset($_SESSION)){
        session_start();
        $ingreso=1;
    }
    $auth = $_SESSION['login'] ?? false;

    if(!isset($inicio)){
        $inicio = false;
    }
?>

<div class="barra">
     <p>BIENVENIDO </p> <!--pendiente revizar la variable para poner el nombre de usuario al ingreso de perfil -->
    
    <?php  if ($ingreso===1): ?>
        <div class="clic-boton">
            <a href="cerrar-sesion.php" >Cerrar Sesión</a>
        </div>
    <?php endif; ?>
</div>

