<?php

    require_once '../../app.php';
    use Models\Pais;

    $paisObj = new Pais();


    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $nombrePais = $_POST['nombre'];
        $paisObj -> addPais($nombrePais);
        header('Location: ../../view/pages/pais.php');
    } 