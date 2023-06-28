<?php 

    require_once '../../app.php';
    use Models\Camper;

    $camperObj = new Camper();

    $idCamper= $_GET['idCamper'];

    $camper = $camperObj -> getCamper($idCamper);

    $regiones = $camperObj -> getRegiones();

    if($contact === false){
        http_response_code(404);
        echo('HTTP 404 NOT FOUND');
        return;
    } 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombreCamper = $_POST['nombreCamper'];
        $apellidoCamper = $_POST['apellidoCamper'];
        $fechaNac = $_POST['fechaNac'];
        $idReg = $_POST['idReg'];

        $camperObj -> editCamper($nombreCamper, $apellidoCamper, $fechaNac, $idReg, $idCamper);

        header('Location: ../../view/pages/campers.php');
    }

?>

<?php require_once '../../templates/header.php' ?>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header text-center">
                EDITAR PAIS
            </div>
            <div class="card-body">
                <form action="edit.php?idCamper=<?= $idCamper ?>" method="POST" class="row g-3">
                    <div class="col-6">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombreCamper" value="<?= $camper['nombreCamper'] ?>" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Apellido</label>
                        <input type="text" class="form-control" name="apellidoCamper" value="<?= $camper['apellidoCamper'] ?>" required>
                    </div>
                    <div class="col-6">
                        <label class="form-label">Fecha</label>
                        <input type="date" class="form-control" name="fechaNac" value="<?= $camper['fechaNac'] ?>" required>
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
        </div>
    </div>
<?php require_once '../../templates/footer.php' ?>