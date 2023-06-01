<main>
    <div class="contenerdor_formulario">
        <div class="formulario">
            <div class="cuadro">
                <h3>Plataforma de ingreso</h3>
                    <!-- varificacion de errores al ingresar -->
                    <?php foreach ($errores as $error): ?>
                        <div class="alerta error">
                            <?php echo $error; ?>
                        </div>
                    <?php endforeach; ?>

                <form method = "POST"  action="/login"> <!-- En el action puedo colocar donde quiero enviar los datos pero si no lo hago lo enviara al mismo archivo -->
                    <div class="input-box">
                        <input type="email" name="email" placeholder="Email" id="email" class="input-control" > <!-- required es para activar las validaciones de html5 -->
                    </div>
                    <div class="input-box">
                        <input type="password" name="password" placeholder="Password" id="password"  class="input-control" ><!-- required es para activar las validaciones de html5 -->
                    </div>
                    <button type="submit" class="boton">Iniciar Sesión</button>
                </form>

                <div class="clic-boton">
                    <div class="input-link">
                        <a href="/recuperar" class="gradient-text">Olvido su contraseña</a>
                    </div>
                    <p>¿No tienes una cuenta? <a href="/eleccion" class="gradient-text">Crear cuenta</a></p>
                </div>
            </div>
        </div>
    </div>
</main>