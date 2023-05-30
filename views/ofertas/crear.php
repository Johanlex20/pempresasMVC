<main>
    <div class="contenerdor_formulario">
        <div class="formulario">
                <div class="cuadro">
                    <h3>Información de la Oferta</h3>
                   <!-- mensaje de validacion complete los datos -->
                    <?php foreach($errores as $error): ?>  
                        <div class="alerta error">
                            <?php echo $error; ?>
                        </div>
                    <?php endforeach;?> 
                    <form class="formulario-oferta" method ="POST"  enctype="multipart/form-data">
                        <?php include __DIR__ . '/formulario_ofertas.php' ?>
                        <button type="submit" class="boton">Publicar Oferta</button>
                    </form>
                    <div class="clic-boton">
                        <p>Ya tienes una cuenta <a href="/login.php"class="gradient-text">Iniciar Sesion</a></p>
                    </div>
                </div>
        </div>
    </div>
           <!-- boton Volver -->
           <a href="/admin/admin" class="boton-volver"> 
            <span class="texto-fondo">Volver</span>
           </a>
    </main>