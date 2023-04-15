<!-- Modal trigger button -->
<?php

if ($_POST) {

    $nombre = (isset($_POST['nombre']) ? $_POST['nombre'] : "");
    $telefono = (isset($_POST['telefono']) ? $_POST['telefono'] : "");
    $fecha = (isset($_POST['fecha']) ? $_POST['fecha'] : "");

    $stm = $conexion->prepare("INSERT INTO contactos(id,nombre,telefono,fecha)
   VALUES(null,:nombre,:telefono,:fecha)");
    $stm->bindParam(':nombre', $nombre);
    $stm->bindParam(':telefono', $telefono);
    $stm->bindParam(':fecha', $fecha);
    $stm->execute();
    header("location:index.php");
}
?>

<!-- Modal Body -->
<!-- if you want to close by clicking outside the modal, delete the last endpoint:data-bs-backdrop and data-bs-keyboard -->
<div class="modal fade" id="create" tabindex="-1" data-bs-backdrop="static" data-bs-keyboard="false" role="dialog" aria-labelledby="modalTitleId" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable modal-dialog-centered modal-sm" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalTitleId">Agregar Usuario</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <form action="" method="post">
            <div class="modal-body">

                <label>Nombre</label>
                <input type="text" class="form-control" name="nombre" value="">

                <label>Telefono</label>
                <input type="text" class="form-control" name="telefono" value="">
                <label>Fecha</label>
                <input type="date" class="form-control" name="fecha" value="">

                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <button type="submit" class="btn btn-primary">Guardar</button>
                </div>
            </div>
            </form>
        </div>
    </div>