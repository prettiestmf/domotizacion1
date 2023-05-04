<?php

require_once '../../../includes/conexion.php';

if($_POST) {
    $idpago = $_POST['idpago'];

    $sql = "UPDATE pagos SET estado = 0 WHERE id_pago = ?";
    $query = $pdo->prepare($sql);
    $result = $query->execute(array($idpago));
    
    if($result) {
        $respuesta = array('status' => true,'msg' => 'Pago eliminado correctamente');
    } else {
        $respuesta = array('status' => false,'msg' => 'Error al eliminar');
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}