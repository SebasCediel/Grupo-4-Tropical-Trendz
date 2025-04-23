<?php
session_start();

$host = "localhost";
$user = "root";
$password = "";
$dbname = "tropical_trendz";

$conn = new mysqli($host, $user, $password, $dbname);

if ($conn->connect_error) {
    die(json_encode(['status' => 'error', 'message' => 'Error de conexión']));
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    if (empty($email) || empty($password)) {
        echo json_encode(['status' => 'error', 'message' => 'Todos los campos son requeridos']);
        exit();
    }

    $sql = "SELECT idcliente, nombre, password FROM clientes WHERE email = ?";
    $stmt = $conn->prepare($sql);

    if (!$stmt) {
        echo json_encode(['status' => 'error', 'message' => 'Error en la base de datos']);
        exit();
    }

    $stmt->bind_param("s", $email);
    $stmt->execute();
    $stmt->store_result();

    if ($stmt->num_rows > 0) {
        $stmt->bind_result($id, $nombre, $hashed_password);
        $stmt->fetch();

        if (password_verify($password, $hashed_password)) {
            $_SESSION["user_id"] = $id;
            $_SESSION["user_email"] = $email;
            $_SESSION["user_name"] = $nombre;
            echo json_encode(['status' => 'success', 'message' => 'Inicio de sesión exitoso']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Contraseña incorrecta']);
        }
    } else {
        echo json_encode(['status' => 'error', 'message' => 'El correo no está registrado']);
    }

    $stmt->close();
    $conn->close();
}
?>
