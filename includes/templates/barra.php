
<?php  
    //VERIFICA SI LA SESSION ESTA INICIADA SI NO PUES ENVIA A VALIDACION
    if(!isset($_SESSION)){
        session_start();
        
    }
    $auth = $_SESSION['login'] ?? false;

    if(!isset($inicio)){
        $inicio = false;
    }
?>

<div class="barra">
     <p>BIENVENIDO </p> <!--pendiente revizar la variable para poner el nombre de usuario al ingreso de perfil -->
    
    <?php  if ($auth): ?>
        <div class="clic-boton">
            <a href="/logout" >Cerrar Sesión</a>
        </div>
    <?php endif; ?>
</div>

