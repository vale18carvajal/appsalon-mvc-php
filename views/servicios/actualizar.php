<h1 class="nombre-pagina">Actualizar Servicio</h1>
<p class="descripcion-pagina">Modifica la información de los servicios</p>

<?php
include_once __DIR__ . '/../template/barra.php';
include_once __DIR__ . '/../template/alertas.php';
?>

<form method="POST" class="formulario">
    <?php include_once __DIR__ . '/formulario.php'?>
    <input type="submit" class="boton" value="Actualizar Servicio">
</form>