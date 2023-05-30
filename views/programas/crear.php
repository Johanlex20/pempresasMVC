<main>
    <div class="contenerdor_formulario">
        <div class="formulario">
                <div class="cuadro">
                    <h3>Crear Programa</h3>
                   <!-- mensaje de validacion complete los datos -->
                    <?php foreach($errores as $error): ?>  
                        <div class="alerta error">
                            <?php echo $error; ?>
                        </div>
                    <?php endforeach;?> 
                    <form class="formulario-aprendiz" method ="POST">
                        <?php include __DIR__ . '/formulario_programas.php' ?>
                        <button type="submit" class="boton">Crear Programa</button>
                    </form>
                    <div class="clic-boton">
                        <p>Ya tienes una cuenta <a href="/login.php"class="gradient-text">Iniciar Sesion</a></p>
                    </div>
                </div>
        </div>
    </div>
    <a href="/admin/admin" class="boton-volver"> 
        <span class="texto-fondo">Volver</span>
    </a>
</main>