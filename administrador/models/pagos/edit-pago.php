<?php

require '../../../includes/conexion.php';

if(!empty($_GET)) {
    $idpago = $_GET['idpago'];

    $sql = "SELECT * FROM pagos WHERE id_pago = ?";
    $query = $pdo->prepare($sql);
    $query->execute(array($idpago));
    $result = $query->fetch(PDO::FETCH_ASSOC);

    if(empty($result)) {
        $respuesta = array('status' => false,'msg' => 'datos no encontrados');
    } else {
        $respuesta = array('status' => true,'data' => $result);
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}