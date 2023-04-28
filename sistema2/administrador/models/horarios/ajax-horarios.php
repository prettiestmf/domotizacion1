<?php

require_once '../../../includes/conexion.php';

if(!empty($_POST)) {
    if(empty($_POST['aula'])) {
        $respuesta = array('status' => false,'msg' => 'Todos los campos son necesarios');
    } else {
        $horario_id = $_POST['horario_id'];
        $aula = $_POST['aula'];
        $hora_on = $_POST['hora_on'];
        $hora_off = $_POST['hora_off'];
        $dia = $_POST['dia'];
        $estado = $_POST['listEstado'];

        $sql = 'SELECT * FROM horarios WHERE aula = ? AND horario_id != ? AND hora_on != ? AND hora_off != ? AND dia != ? AND estado != 0';
        $query = $pdo->prepare($sql);
        $query->execute(array($aula,$horario_id));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result > 0) {
            $respuesta = array('status' => false,'msg' => 'Periodo ya existe');
        } else {
            if($idhorario == 0) {
                $sqlInsert = 'INSERT INTO horarios (aula, hora_on, hora_off, dia, estado) VALUES (?,?,?,?,?)';
                $queryInsert = $pdo->prepare($sqlInsert);
                $request = $queryInsert->execute(array($aula,$hora_on,$hora_off,$dia,$estado));
                $accion = 1;
            } else {
                    $sqlUpdate = 'UPDATE horarios SET aula = ?, hora_on = ?, hora_off = ?, dia = ?, estado = ? WHERE horario_id = ?';
                    $queryUpdate = $pdo->prepare($sqlUpdate);
                    $request = $queryUpdate->execute(array($aula,$hora_on,$hora_off,$dia,$estado,$idperiodo));
                    $accion = 2;
            }  

            if($request > 0) {
                if($accion == 1) {
                    $respuesta = array('status' => true,'msg' => 'Periodo creado correctamente');
                } else {
                    $respuesta = array('status' => true,'msg' => 'Periodo actualizado correctamente');
                }
            }
        }
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}