<?php 

    require_once '../../app.php';
    use Models\Pais;

    $paisObj = new Pais();

    $idPais = $_GET['idPais'];

    $pais = $paisObj -> getPais($idPais);
    
    if($pais == false){
        http_response_code(404);
        echo 'HTTP 404 NOT FOUND';
        return;
    } else {
        $paisObj -> deletePais($idPais);
        header('Location: ../../view/pages/pais.php');
    }

?>