<?php

require_once '../../../includes/conexion.php';

$sql = 'SELECT * FROM horarios WHERE estado != 0';
$query = $pdo->prepare($sql);
$query->execute();

$consulta = $query->fetchAll(PDO::FETCH_ASSOC);

for($i = 0;$i < count($consulta);$i++) {
    if($consulta[$i]['estado'] == 1) {
        $consulta[$i]['estado'] = '<span class="badge badge-success">Activo</span>';
    } else {
        $consulta[$i]['estado'] = '<span class="badge badge-danger">Inactivo</span>';
    }

    $consulta[$i]['acciones'] = '
            <button class="btn btn-primary btn-sm" title="Editar" onclick="editarHorario('.$consulta[$i]['horario_id'].')">Editar</button>
            <button class="btn btn-danger btn-sm" title="Eliminar" onclick="eliminarHorario('.$consulta[$i]['horario_id'].')">Eliminar</button>
                                ';
}

echo json_encode($consulta,JSON_UNESCAPED_UNICODE);