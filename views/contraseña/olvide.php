<main>
    <div class="contenerdor_formulario">
        <div class="formulario">
            <div class="cuadro">
                
                <h3>Contraseña Olvidada</h3>
                <?php include_once __DIR__ . '/../templates/alertas.php'; ?>
                <form method="POST" action="/olvide" >
                    <div class="input-box">
                        <input type="text" 
                               id="email"
                               name="email"
                               placeholder="Ingresé Email" 
                               class="input-control">
                    <button type="submit" class="boton">Enviar Instruciones</button>
                </form>
                    
                <div class="clic-boton">
                    <p>¿No tienes una cuenta? <a href="/eleccion" class="gradient-text">Crear cuenta</a></p>
                </div>
            </div>
        </div>
    </div>
</main>