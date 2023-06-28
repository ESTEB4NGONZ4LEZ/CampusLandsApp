<?php 

    require_once '../../app.php';
    use Models\Pais;

    $paisObj = new Pais();

    $idPais = $_GET['idPais'];

    $pais = $paisObj -> getPais($idPais);

    if($contact === false){
        http_response_code(404);
        echo('HTTP 404 NOT FOUND');
        return;
    } 

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombrePais = $_POST['nombrePais'];

        $paisObj -> editPais($nombrePais, $idPais);

        header('Location: ../../view/pages/pais.php');
    }

?>

<?php require_once '../../templates/header.php' ?>
    <div class="container mt-5 d-flex justify-content-center">
        <div class="card w-50">
            <div class="card-header text-center">
                EDITAR PAIS
            </div>
            <div class="card-body">
                <form action="edit.php?idPais=<?= $idPais ?>" method="POST" class="row g-3">
                    <div class="col-12">
                        <label class="form-label">Nombre</label>
                        <input type="text" class="form-control" name="nombrePais" value="<?= $pais['nombrePais'] ?>" required>
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