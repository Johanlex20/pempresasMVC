<main>
    <div class="contenerdor_formulario">
        <div class="formulario">
                <div class="cuadro">
                    <h3>Crear cuenta aprendiz</h3>

                    <?php 
                        include_once __DIR__ . "/../templates/alertas.php";
                    ?>
                    
                    <form class="formulario-aprendiz" method ="POST">
                        <?php include __DIR__ . '/formulario_aprendiz.php'; ?>
                        <button type="submit" class="boton">Crear Cuenta</button>
                    </form>
                    <div class="clic-boton">
                        <p>Ya tienes una cuenta <a href="/login"class="gradient-text">Iniciar Sesion</a></p>
                    </div>
                </div>
        </div>
    </div>
</main>