<?php

require_once '../../../includes/conexion.php';

if($_POST) {
    $horario_id = $_POST['horario_id'];

    $sql = "UPDATE horarios SET estado = 0 WHERE horario_id = ?";
    $query = $pdo->prepare($sql);
    $result = $query->execute(array($horario_id));
    
    if($result) {
        $respuesta = array('status' => true,'msg' => 'Materia eliminada correctamente');
    } else {
        $respuesta = array('status' => false,'msg' => 'Error al eliminar');
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}