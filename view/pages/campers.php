<?php

    require_once '../../app.php';
    use Models\Camper;

    $camperObj = new Camper();

    $regiones = $camperObj -> getRegiones();

    $campers = $camperObj -> getCampers();

?>

<?php require_once '../../templates/header.php' ?>

    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-75">
            <div class="card-header">
                CAMPERS
            </div>
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">REGISTRAR</button>
                
                <table class="table" id="miTabla">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Apellido</th>
                            <th scope="col">Fecha de Nacimiento</th>
                            <th scope="col">Region</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody style="color: black;">
                        <?php foreach($campers as $camper):?>
                            <tr>
                                <td scope="row"><?= $camper['idCamper'] ?></td>
                                <td scope="row"><?= $camper['nombreCamper'] ?></td>
                                <td scope="row"><?= $camper['apellidoCamper'] ?></td>
                                <td scope="row"><?= $camper['fechaNac'] ?></td>
                                <td scope="row"><?= $camper['idReg'] ?></td>
                                <td scope="row">
                                    <a href="../../controllers/Camper/edit.php?idCamper=<?= $camper['idCamper'] ?>"><button class="btn btn-warning">E</button></a>
                                    <a href="../../controllers/Camper/delete.php?idCamper=<?= $camper['idCamper'] ?>"><button class="btn btn-danger">X</button></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>


    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">REGISTRAR CAMPER</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="../../controllers/Camper/add.php" method="POST" class="row g-3">
                    <div class="col-6">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombreCamper" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="apellidoCamper" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Fecha</label>
                        <input type="date" class="form-control" name="fechaNac" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Region</label>
                        <select class="form-select" aria-label="Default select example" name="idReg">
                            <option selected></option>
                            <?php foreach($regiones as $region): ?>
                                <option value="<?= $region['idReg'] ?>"><?= $region['nombreReg'] ?></option>
                            <?php endforeach ?>
                        </select>
                    </div>
                    <div class="col-6 pt-2 pb-2">
                        <button type="reset" class="btn btn-danger">CANCELAR</button>
                    </div>
                    <div class="col-6 text-end pt-2 pb-2">
                        <button type="submit" class="btn btn-success">ACEPTAR</button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
            </div>
        </div>
    </div>




<?php require_once '../../templates/footer.php' ?>