<?php

require_once '../../../includes/conexion.php';

if(!empty($_POST)) {
    if(empty($_POST['listAlumno']) || empty($_POST['listProfesor']) || empty($_POST['listPeriodo'])) {
        $arrResponse = array('status' => false,'msg' => 'Todos los campos son necesarios');
    } else {
        $idalumnoprofesor = $_POST['idalumnoprofesor'];
        $profesor = $_POST['listProfesor'];
        $alumno = $_POST['listAlumno'];
        $periodo = $_POST['listPeriodo'];
        $status = $_POST['listEstado'];

        // CONSULTA PARA INSERTAR
        $sql = "SELECT * FROM alumno_profesor WHERE alumno_id = ? AND pm_id = ? AND periodo_id = ? AND estadop != 0";
        $query = $pdo->prepare($sql);
        $query->execute(array($alumno,$profesor,$periodo));
        $resultInsert = $query->fetch(PDO::FETCH_ASSOC);

        // CONSULTA PARA ACTUALIZAR
        $sql2 = "SELECT * FROM alumno_profesor WHERE alumno_id = ? AND pm_id = ? AND periodo_id = ? AND estadop != 0 AND ap_id != ?";
        $query2 = $pdo->prepare($sql2);
        $query2->execute(array($profesor,$alumno,$periodo,$idalumnoprofesor));
        $resultUpdate = $query2->fetch(PDO::FETCH_ASSOC);

        if($resultInsert > 0) {
            $arrResponse = array('status' => false,'msg' => 'El alumno ya tiene el grado y el profesor asignado, seleccione otro');
        } else {
            if($idalumnoprofesor == 0) {
                $sql_insert = "INSERT INTO alumno_profesor (alumno_id,pm_id,periodo_id,estadop) VALUES (?,?,?,?)";
                $query_insert = $pdo->prepare($sql_insert);
                $request = $query_insert->execute(array($alumno,$profesor,$periodo,$status));
                if($request) {
                    $arrResponse = array('status' => true,'msg' => 'Proceso Alumno creado correctamente'); 
                }
            }  
        }

        if($resultUpdate > 0) {
            $arrResponse = array('status' => false,'msg' => 'El alumno ya tiene el grado y el profesor asignado, seleccione otro');
        } else {
            if($idalumnoprofesor > 0) {
                $sql_update = "UPDATE alumno_profesor SET alumno_id = ?,pm_id = ?,periodo_id = ?,estadop = ? WHERE ap_id = ?";
                $query_update = $pdo->prepare($sql_update);
                $request2 = $query_update->execute(array($alumno,$profesor,$periodo,$status,$idalumnoprofesor));
                if($request2) {
                    $arrResponse = array('status' => true,'msg' => 'Proceso Alumno actualizado correctamente');
                }
             }
        }
    }
    echo json_encode($arrResponse,JSON_UNESCAPED_UNICODE);
}