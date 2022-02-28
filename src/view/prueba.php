<?php 

//archivo de prueba para comprobar la conexion en desarrollo

$sql = 'SELECT CURDATE();';
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        print_r($row);
    }
}
