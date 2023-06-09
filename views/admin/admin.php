
    <section class="contenedor seccion"> 
        <h1 class="admi-text">Administrador de P-empresas</h1>

           <?php 
            if($resultado) {
                $mensaje = mostrarNotificacion( intval ($resultado));
                if($mensaje){?>
                    <p class "alerta exito"> <?php echo s ($mensaje) ?> </p>
                <?php }        
            }
           ?>        
       

    </section>
    
    
    
