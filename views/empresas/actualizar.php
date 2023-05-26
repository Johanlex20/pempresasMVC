<main>
    <div class="contenerdor_formulario">
        <div class="formulario">
                <div class="cuadro">
                    <h3>Actualizar Empresa</h3>
                   <!-- mensaje de validacion complete los datos -->
                    <?php foreach($errores as $error): ?>  
                        <div class="alerta error">
                            <?php echo $error; ?>
                        </div>
                    <?php endforeach;?> 
                    <form class="formulario-oferta" method ="POST"  enctype="multipartform-data">
                        <?php include __DIR__ . '/formulario_empresas.php'; ?>
                        <button type="submit" class="boton">Actualizar Cuenta</button>
                    </form> 
                    <div class="clic-boton">
                        <p>Ya tienes una cuenta <a href="/login.php"class="gradient-text">Iniciar Sesion</a></p>
                    </div>
                </div>
        </div>
        <a href="/empresas/consultar" class="boton-volver">  <!--necesita estilos-->
            <span class="texto-fondo">Volver</span>
        </a>
    </div>
</main>