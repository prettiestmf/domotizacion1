<?php

require_once '../../../includes/conexion.php';

if(!empty($_POST)) {
    if(empty($_POST['nombre']) || empty($_POST['usuario'])) {
        $respuesta = array('status' => false,'msg' => 'Todos los campos son necesarios');
    } else {
        $idusuario = $_POST['idusuario'];
        $nombre = $_POST['nombre'];
        $usuario = $_POST['usuario'];
		$clave = password_hash($_POST['clave'],PASSWORD_DEFAULT);
        $rol = $_POST['listRol'];
        $estado = $_POST['listEstado'];
		
		if(empty($_POST['clave'])) {
			$clave = NULL;
		}
			
        $sql = 'SELECT * FROM usuarios WHERE usuario = ? AND usuario_id != ? AND estado != 0';
        $query = $pdo->prepare($sql);
        $query->execute(array($usuario,$idusuario));
        $result = $query->fetch(PDO::FETCH_ASSOC);

        if($result > 0) {
            $respuesta = array('status' => false,'msg' => 'El usuario ya existe');
        } else {
			$sqlUpdate = 'call actualiza_usuarios (?,?,?,?,?,?)';
			$queryUpdate = $pdo->prepare($sqlUpdate);
			$request = $queryUpdate->execute(array($idusuario,$nombre,$usuario,$clave,$rol,$estado));
			
			if ($idusuario == 0 ){
				$respuesta = array('status' => true,'msg' => 'Usuario Creado ');
			}else{
				$respuesta = array('status' => true,'msg' => 'Usuario Actualizado ');
			}			
		}  
    }
    echo json_encode($respuesta,JSON_UNESCAPED_UNICODE);
}