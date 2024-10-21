<?php
// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "bd_proyectodw");

if (!$conexion) {
    echo json_encode(['status' => 'error', 'message' => 'Error de conexión: ' . mysqli_connect_error()]);
    exit();
}

if (!empty($_POST["usuario"]) && !empty($_POST["contra"]) && !empty($_POST["tipo_usuario"]) && !empty($_POST["nombre_completo"]) && !empty($_POST["email"])) {
    
    $usuario = $_POST["usuario"];
    $contra = $_POST["contra"];
    $tipo_usuario = $_POST["tipo_usuario"];
    $nombre_completo = $_POST["nombre_completo"];
    $email = $_POST["email"];

    // Escapa las variables para evitar inyecciones SQL
    $usuario = $conexion->real_escape_string($usuario);
    $contra = $conexion->real_escape_string($contra);
    $tipo_usuario = $conexion->real_escape_string($tipo_usuario);
    $nombre_completo = $conexion->real_escape_string($nombre_completo);
    $email = $conexion->real_escape_string($email);

    // Cifrar la contraseña
    $passw_hashed = password_hash($contra, PASSWORD_DEFAULT);

    // Verificar si el usuario ya existe
    $checkUser = "SELECT * FROM Usuarios WHERE user = '$usuario'";
    $result = $conexion->query($checkUser);

    if ($result->num_rows > 0) {
        echo json_encode(['status' => 'error', 'message' => 'El usuario ya existe.']);
    } else {
        // Insertar los datos en la base de datos
        $sql = "INSERT INTO Usuarios (user, pass, tipo_usuario, nombre_completo, email) VALUES ('$usuario', '$passw_hashed', '$tipo_usuario', '$nombre_completo', '$email')";

        if ($conexion->query($sql) === TRUE) {
            echo json_encode(['status' => 'success', 'message' => 'Usuario ingresado con éxito.']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Error al registrarse: ' . $conexion->error]);
        }
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Alguno de los campos está vacío.']);
}

$conexion->close();
?>
