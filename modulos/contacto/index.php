<?php
include("../../template/conexion.php");

$stm = $conexion->prepare("SELECT * FROM contactos");
$stm->execute();
$contactos = $stm->fetchAll(PDO::FETCH_ASSOC);

if(isset($_GET['id'])){

    $txtid = (isset($_GET['id']) ? $_GET['id'] :"");
    $stm = $conexion->prepare("DELETE FROM contactos WHERE id = :txtid");
    $stm ->bindParam(":id", $txtid);
    $stm ->execute();
    header("location:index.php");
    
    }
?>


<?php include("../../template/header.php"); ?>
<button type="button" class="btn btn-primary btn-lg" data-bs-toggle="modal" data-bs-target="#create">
    crear Usuario
</button>
<br>
<br>
<div class="table-responsive">
    <table class="table">
        <thead class="table table-dark">
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombre</th>
                <th scope="col">Telefono</th>
                <th scope="col">Fecha Ingreso</th>
                <th scope="col">Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($contactos as $contacto) { ?>
                <tr class="">
                    <td scope="row"><?php echo $contacto['id']; ?></td>
                    <td><?php echo $contacto['nombre']; ?></td>
                    <td><?php echo $contacto['telefono']; ?></td>
                    <td><?php echo $contacto['fecha']; ?></td>
                    <td>
                        <a href="#" class="btn btn-info">Editar</a>
                        <a href="index.php?id=<?php echo $contacto['id']; ?>" class="btn btn-danger">Eliminar</a>
                    </td>

                </tr>
            <?php } ?>
        </tbody>
    </table>
</div>

<?php include("../contacto/create.php"); ?>

<?php include("../../template/footer.php"); ?>