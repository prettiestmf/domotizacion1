<?php

// Conectar a la base de datos
$db = new mysqli('localhost', 'root', 'Chocolate123', 'sistema-escolar2');
if ($db->connect_error) {
    header('HTTP/1.1 500 Internal Server Error');
    die('Internal Server Error');
}

// Preparar y ejecutar la consulta para obtener los eventos programados
$stmt = $db->prepare('SELECT event_day, event_time_start, event_time_end FROM events ORDER BY event_time_start ASC');
$stmt->execute();
$stmt->bind_result($event_day, $event_time_start, $event_time_end);

// Recorrer los resultados y guardarlos en un arreglo
$events = array();
while ($stmt->fetch()) {
    $events[] = array('event_day' => $event_day, 'event_time_start' => date("h:i A", strtotime($event_time_start)), 'event_time_end' => date("h:i A", strtotime($event_time_end)));
}

// Cerrar la conexión a la base de datos
$db->close();

// Devolver los eventos como JSON
header('Content-Type: application/json');
echo json_encode(array("success" => true, "events" => $events));

?>