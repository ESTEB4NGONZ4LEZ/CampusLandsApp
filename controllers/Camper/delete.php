<?php 

    require_once '../../app.php';
    use Models\Camper;

    $camperObj = new Camper();

    $idCamper = $_GET['idCamper'];

    $camper = $camperObj -> getCamper($idCamper);
    
    if($camper == false){
        http_response_code(404);
        echo 'HTTP 404 NOT FOUND';
        return;
    } else {
        $camperObj -> deleteCamper($idCamper);
        
        header('Location: ../../view/pages/campers.php');
    }

?>