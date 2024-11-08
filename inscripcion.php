<?php
// Configuración de conexión
$servername = "localhost";  // Cambia si tu servidor es diferente
$username = "root";         // Cambia si tu usuario es diferente
$password = "";             // Cambia si tu contraseña es diferente
$dbname = "zonex";          // Asegúrate de que el nombre de tu base de datos sea correcto

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$name = $_POST['name'];
$surname = $_POST['surname'];
$email = $_POST['email'];
$telefono = $_POST['telefono'];
$eventos = $_POST['eventos']; // Asegúrate de que 'eventos' sea un array enviado desde el formulario

// Inicializar las variables para los eventos
$Noche_de_juego_retro = 0;
$Cosplay = 0;
$Game_dine = 0;
$Realidad_virtual = 0;

// Marcar los eventos seleccionados como 1
foreach($eventos as $x) {
    if ($x == 1) { $Noche_de_juego_retro = 1; }
    if ($x == 2) { $Cosplay = 1; }
    if ($x == 3) { $Game_dine = 1; }
    if ($x == 4) { $Realidad_virtual = 1; }
}

// Insertar datos en la tabla
$sql = "INSERT INTO usuarios (nombre, apellido, email, telefono, `Noche_de_juego_retro`, `Cosplay`, `Game_dine`, `Realidad_virtual`)
VALUES ('$name', '$surname', '$email', '$telefono', $Noche_de_juego_retro, $Cosplay, $Game_dine, $Realidad_virtual)";

// Ejecutar la consulta
if ($conn->query($sql) === TRUE) {
    echo "¡Inscripción realizada con éxito!";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

// Cerrar la conexión
$conn->close();
?>
