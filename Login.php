<?php
session_start();

// Conexión a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "bd_proyectodw") or die('Error al conectar con la Base de Datos');
$conexion->set_charset("utf8");

// Validación si existe en la bd
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $contra = $_POST['contra'] ?? '';

    if (empty($usuario) || empty($contra)) {
        echo "Por favor, complete todos los campos";
        exit;
    }

    $stmt = $conexion->prepare("SELECT pass, tipo_usuario FROM Usuarios WHERE user = ?");
    $stmt->bind_param("s", $usuario);
    $stmt->execute();
    $stmt->store_result();

    // Verificar si el usuario existe
    if($stmt->num_rows > 0) {
        // Obtener la contraseña guardada en la base de datos
        $stmt->bind_result($hash, $tipo_usuario);
        $stmt->fetch();

        // Verificar la contraseña ingresada
        if(password_verify($contra, $hash)) {
            $_SESSION['user'] = $usuario;
            $_SESSION['tipo_usuario'] = $tipo_usuario;

            echo json_encode([
                'status' => 'success',
                'tipo_usuario' => $tipo_usuario
            ]);
        } else {
            echo json_encode([
                'status' => 'error',
                'message' => 'Contraseña incorrecta'
            ]);
        }
    } else {
        echo json_encode([
            'status' => 'error',
            'message' => 'Usuario no encontrado'
        ]);
    }
    $stmt->close();
}

$conexion->close();
?>