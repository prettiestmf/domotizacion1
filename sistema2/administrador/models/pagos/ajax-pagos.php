<?php

require_once '../../../includes/conexion.php';

if(!empty($_POST)) {
    if(empty($_POST['listalumno'])) {
        $respuesta = array('status' => false,'msg' => 'Todos los campos son necesarios');
    } else {
        
		$idpago = $_POST['idpago'];
        $alumno = $_POST['listalumno'];
		$monto = $_POST['monto'];
		$metodo = $_POST['listmetodo'];
		$objeto = $_POST['listobjeto'];
		$fecha = $_POST['fecha'];
        $estado = $_POST['listEstado'];
		
		
        $sql = 'SELECT * FROM pagos WHERE id_tercero = ? AND id_pago != ? AND estado != 0';
        $query = $pdo->prepare($sql);
        $query->execute(array($alumno,$idpago));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result > 0) {
            $respuesta = array('status' => false,'msg' => 'El pago ya existe');
        } else {
            if($idpago == 0) {
                $sqlInsert = 'INSERT INTO pagos (nombre_pago,estado) VALUES (?,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($nombre,$estado));
                $accion = 1;
            } else {
                    $sqlUpdate = 'UPDATE pagos SET nombre_pago = ?,estado = ? WHERE pago_id = ?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($nombre,$estado,$idpago));
                    $accion = 2;
            }  

            if($request > 0) {
                if($accion == 1) {
                    $respuesta = array('status' => true,'msg' => 'Pago creado correctamente');
                } else {
                    $respuesta = array('status' => true,'msg' => 'Pago actualizado correctamente');
                }
            }
        }
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}