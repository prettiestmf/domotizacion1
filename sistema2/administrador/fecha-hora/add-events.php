<?php

// Verificar si se recibieron los datos del formulario
if (!isset($_POST['time_start']) || !isset($_POST['time_end']) || !isset($_POST['event_day'])) {
    header('HTTP/1.1 400 Bad Request');
    die('Bad Request');

}else {

// Conectar a la base de datos
$db = new mysqli('localhost', 'root', 'Chocolate123', 'sistema-escolar2');
if ($db->connect_error) {
    header('HTTP/1.1 500 Internal Server Error');
    die('Internal Server Error');
}
// Obtener la fecha actual
$current_date = date('H:i');;

$user_event_day = $_POST['event_day'];
$user_time_start = date('H:i', strtotime($_POST['time_start']));
$user_time_end = date('H:i', strtotime($_POST['time_end']));

    if ($user_time_start < $user_time_end) {
       // Preparar y ejecutar la consulta para insertar el evento en la tabla
$stmt = $db->prepare('INSERT INTO events (event_day, event_time_start, event_time_end) VALUES (?, ?, ?)');
$stmt->bind_param('sss', $user_event_day,$user_time_start, $user_time_end);
$result = $stmt->execute();

// Cerrar la conexión a la base de datos
$db->close();

// Crear un objeto JSON con el resultado de la operación
$response = array();
if ($result) {
    $response['success'] = true;
    $response['message'] = 'Evento agregado exitosamente';
} else {
    $response['success'] = false;
    $response['message'] = 'Error al agregar evento';
}

// Enviar respuesta al cliente en formato JSON
header('Content-Type: application/json');
echo json_encode($response);
    } else {
        $response['success'] = false;
        $response['message'] = 'Error, verifique que la fecha final sea posterior a la fecha de inicio del evento.';
        echo json_encode($response);
    }


}