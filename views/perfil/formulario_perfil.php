<div class="perfil">
  <h2>Datos Principales</h2>
  <div class="datos-perfil">
    <div class="datos">
      <label>Nombre:</label>
      <span id="name"><?php echo $_SESSION['nombre']; ?></span>
    </div>
    <div class="datos">
      <label>Teléfono:</label>
      <span id="phone"><?php echo $_SESSION['telefono']; ?></span>
    </div>
    <div class="datos">
      <label>Email:</label>
      <span id="email"><?php echo $_SESSION['email']; ?></span>
    </div>
    <div class="datos">
      <label>Rol:</label>
      <span id="role"><?php echo convertirRol($_SESSION['Idrol']); ?></span>
    </div>
  </div>
</div>

<?php
// Función para convertir el valor numérico del rol en un string correspondiente
function convertirRol($idRol) {
  switch ($idRol) {
    case 1:
      return 'Administrador';
    case 2:
      return 'Usuario Empresa';
    case 3:
      return 'Aprendiz';
    default:
      return 'desconocido';
  }
}
?>