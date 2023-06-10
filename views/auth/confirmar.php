
<h1 class="admi-text-home">Confirmar Cuenta</h1>

<?php include_once __DIR__ . '/../templates/alertas.php'; ?>
<!-- boton Volver -->
<a href="/login" class="boton-volver" > 
    <span class="texto-fondo">Inciar Sesión</span>
</a>


<!-- Formulario de confirmación -->
<form method="post" action="/confirmar" id="confirmar-form">
    <input type="hidden" name="confirmar" value="1">
    <button type="submit" class="boton-confirmar">Confirmar</button>
</form>

