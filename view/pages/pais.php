<?php

    require_once '../../app.php';
    use Models\Pais;

    $paisObj = new Pais();

    $paises = $paisObj -> getPaises();

?>

<?php require_once '../../templates/header.php' ?>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div class="card w-75">
                    <div class="card-header text-center">
                        PAIS
                    </div>
                    <div class="card-body">
                        <form action="../../controllers/Pais/add.php" method="POST" class="row g-3">
                            <div class="col-12">
                                <label class="form-label">Nombre</label>
                                <input type="text" class="form-control" name="nombre" required>
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
            <div class="col-md-6 bg-dark p-3 rounded d-flex justify-content-center align-items-center">
                <table class="table" id="miTabla">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Opciones</th>
                        </tr>
                    </thead>
                    <tbody style="color: black;">
                        <?php foreach($paises as $pais):?>
                            <tr>
                                <td scope="row"><?= $pais['idPais'] ?></td>
                                <td scope="row"><?= $pais['nombrePais'] ?></td>
                                <td scope="row">
                                    <a href="../../controllers/Pais/edit.php?idPais=<?= $pais['idPais'] ?>"><button class="btn btn-warning">E</button></a>
                                    <a href="../../controllers/Pais/delete.php?idPais=<?= $pais['idPais'] ?>"><button class="btn btn-danger">X</button></a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
<?php require_once '../../templates/footer.php' ?>