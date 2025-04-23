<?php
session_start();
include 'config/conexion.php';

header('Content-Type: application/json');

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    echo json_encode(['status' => 'error', 'message' => 'Método no permitido']);
    exit();
}

$nombre = trim($_POST['nombre']);
$telefono = trim($_POST['telefono']);
$email = trim($_POST['email']);
$password = trim($_POST['password']);

// Registrar errores en log
error_log("Datos recibidos: Nombre: $nombre, Teléfono: $telefono, Email: $email, Password: $password");

// Validar que los campos no estén vacíos
if (empty($nombre) || empty($telefono) || empty($email) || empty($password)) {
    echo json_encode(['status' => 'error', 'message' => 'Todos los campos son requeridos']);
    exit();
}

// Verificar si el email ya está registrado
$checkEmail = $conn->prepare("SELECT idcliente FROM clientes WHERE email = ?");
if (!$checkEmail) {
    echo json_encode(['status' => 'error', 'message' => 'Error en la preparación de la consulta: ' . $conn->error]);
    exit();
}

$checkEmail->bind_param("s", $email);
$checkEmail->execute();
$checkEmail->store_result();

if ($checkEmail->num_rows > 0) {
    echo json_encode(['status' => 'error', 'message' => 'El correo ya está registrado']);
    $checkEmail->close();
    exit();
}
$checkEmail->close();

// Hashear la contraseña
$password_hash = password_hash($password, PASSWORD_DEFAULT);

// Insertar en la base de datos
$query = "INSERT INTO clientes (nombre, telefono, email, password) VALUES (?, ?, ?, ?)";
if ($stmt = $conn->prepare($query)) {
    $stmt->bind_param("ssss", $nombre, $telefono, $email, $password_hash);
    
    if ($stmt->execute()) {
        $_SESSION["just_registered"] = true;
        $_SESSION["user_email"] = $email;
        $_SESSION["user_name"] = $nombre;
        
        echo json_encode(['status' => 'success', 'message' => 'Registro exitoso']);
    } else {
        error_log("Error en la ejecución: " . $stmt->error);
        echo json_encode(['status' => 'error', 'message' => 'Error al registrar el usuario']);
    }
    $stmt->close();
} else {
    error_log("Error en la preparación de la consulta: " . $conn->error);
    echo json_encode(['status' => 'error', 'message' => 'Error en la preparación de la consulta']);
}

$conn->close();
exit();
?>
