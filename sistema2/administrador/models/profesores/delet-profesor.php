<?php

require_once '../../../includes/conexion.php';

if($_POST) {
    $idprofesor = $_POST['idprofesor'];

    $sql = "UPDATE profesor SET estado = 0 WHERE profesor_id = ?";
    $query = $pdo->prepare($sql);
    $result = $query->execute(array($idprofesor));
    
    if($result) {
        $respuesta = array('status' => true,'msg' => 'Usuario eliminado correctamente');
    } else {
        $respuesta = array('status' => false,'msg' => 'Error al eliminar');
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}