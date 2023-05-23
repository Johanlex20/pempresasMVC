<main>
        <div class="contenerdor_formulario">
            <div class="formulario">
                    <div class="cuadro">
                        <h3>Crear cuenta aprendiz</h3>
                        <form class="formulario-aprendiz" method ="POST">
                            <?php include __DIR__ . '/formulario_aprendiz.php'; ?>
                            <button type="submit" class="boton">Crear Cuenta</button>
                        </form>

                        <div class="clic-boton">
                            <p>Ya tienes una cuenta <a href="/login.php" class="gradient-text">Iniciar Sesion</a></p>
                        </div>
                    </div>
            </div>
        </div>
    </main>