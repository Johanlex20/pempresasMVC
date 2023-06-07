
<!-- mensaje de validacion complete los datos -->
<?php foreach($errores as $error): ?>  
    <div class="alerta error">
        <?php echo "token no válido" ?>
    </div>
<?php endforeach;?>  

<?php 
            if($resultado) {
                $mensaje = mostrarNotificacion( intval ($resultado));
                if($mensaje){?>
                    <p class "alerta exito"> <?php echo s ($mensaje) ?> </p>
                <?php }        
            }
           ?> 



<h1 class="admi-text-home">Confirmar Cuenta</h1>

<!-- boton Volver -->
<a href="/login" class="boton-volver"> 
    <span class="texto-fondo">Inciar Sesión</span>
</a>
