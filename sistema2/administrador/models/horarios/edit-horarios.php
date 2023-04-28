<?php

require '../../../includes/conexion.php';

if(!empty($_GET)) {
    $horario_id = $_GET['horario_id'];

    $sql = "SELECT * FROM horarios WHERE horario_id = ?";
    $query = $pdo->prepare($sql);
    $query->execute(array($horario_id));
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if(empty($result)) {
        $respuesta = array('status' => false,'msg' => 'datos no encontrados');
    } else {
        $respuesta = array('status' => true,'data' => $result);
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}