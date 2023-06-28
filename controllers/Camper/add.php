<?php

    require_once '../../app.php';
    use Models\Camper;

    $camperObj = new Camper();


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombreCamper = $_POST['nombreCamper'];
        $apelligoCamper = $_POST['apellidoCamper'];
        $fechaNac = $_POST['fechaNac'];
        $idReg = $_POST['idReg'];

        $camperObj -> addCamper($nombreCamper, $apelligoCamper, $fechaNac, $idReg);

        header('Location: ../../view/pages/campers.php');
    }
?>