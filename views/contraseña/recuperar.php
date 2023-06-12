<h1 class="admi-text-home">Recuperar Contraseña</h1>
<p class="admi-text-home">Ingresa tu nueva Contraseña a continuación. </p>

<main>
    <div class="contenerdor_formulario">
        <div class="formulario">
            <div class="cuadro">
                
                <h3>Contraseña Olvidada</h3>

                <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
                <?php if ($error) return; ?>

                <form method="POST">
                <div class="input-box">
                        <input 
                        type="password" 
                        name="password" 
                        placeholder="Ingrese nueva contraseña" 
                        id="password"  
                        class="input-control" ><!-- required es para activar las validaciones de html5 -->
                    </div>
                    <button type="submit" class="boton">Reestablecer Nueva Contraseña</button>
                </form>
                <div class="clic-boton">
                    <p>¿Ya tienes una cuenta? <a href="/login" class="gradient-text">Iniciar Sesión</a></p>
                </div>    
                <div class="clic-boton">
                    <p>¿No tienes una cuenta? <a href="/eleccion" class="gradient-text">Crear cuenta</a></p>
                </div>
            </div>
        </div>
    </div>
</main>