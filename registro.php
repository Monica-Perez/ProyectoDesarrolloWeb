<?php
// Conectar a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "bd_proyectodw");

if (!$conexion) {
    echo json_encode(['status' => 'error', 'message' => 'Error de conexión: ' . mysqli_connect_error()]);
    exit();
}

// Verificar que todos los campos estén presentes
if (!empty($_POST["usuario"]) && !empty($_POST["contra"]) && !empty($_POST["tipo_usuario"]) && 
    !empty($_POST["nombre_completo"]) && !empty($_POST["email"]) && !empty($_POST["dpi"]) && 
    !empty($_POST["direccion"]) && !empty($_POST["sexo"]) && !empty($_POST["fecha_nacimiento"])) {

    // Recoger y escapar las variables para evitar inyecciones SQL
    $usuario = $conexion->real_escape_string($_POST["usuario"]);
    $contra = $conexion->real_escape_string($_POST["contra"]);
    $tipo_usuario = $conexion->real_escape_string($_POST["tipo_usuario"]);
    $nombre_completo = $conexion->real_escape_string($_POST["nombre_completo"]);
    $email = $conexion->real_escape_string($_POST["email"]);
    $dpi = $conexion->real_escape_string($_POST["dpi"]);
    $direccion = $conexion->real_escape_string($_POST["direccion"]);
    $sexo = $conexion->real_escape_string($_POST["sexo"]);
    $fecha_nacimiento = $conexion->real_escape_string($_POST["fecha_nacimiento"]);

    // Verificar campos adicionales para médicos
    if ($tipo_usuario === 'medico') {
        if (empty($_POST["especialidad"]) || empty($_POST["colegiado"])) {
            echo json_encode(['status' => 'error', 'message' => 'Faltan campos requeridos para médico.']);
            exit();
        }
        $especialidad = $conexion->real_escape_string($_POST["especialidad"]);
        $colegiado = $conexion->real_escape_string($_POST["colegiado"]);
    }

    // Cifrar la contraseña
    $passw_hashed = password_hash($contra, PASSWORD_DEFAULT);

    // Verificar si el usuario ya existe
    $checkUser = "SELECT * FROM Usuarios WHERE user = '$usuario' OR email = '$email'";
    $result = $conexion->query($checkUser);

    if ($result->num_rows > 0) {
        echo json_encode(['status' => 'error', 'message' => 'El usuario o email ya existe.']);
    } else {
        // Iniciar transacción
        $conexion->begin_transaction();

        try {
            // Insertar en la tabla Usuarios
            $sql = "INSERT INTO Usuarios (user, pass, tipo_usuario, nombre_completo, email, dpi, direccion, sexo, fecha_nacimiento, fecha_registro) 
                    VALUES ('$usuario', '$passw_hashed', '$tipo_usuario', '$nombre_completo', '$email', '$dpi', '$direccion', '$sexo', '$fecha_nacimiento', NOW())";

            if ($conexion->query($sql) === TRUE) {
                $id_usuario = $conexion->insert_id; // Obtener el ID del usuario insertado

                // Si es médico, insertar en la tabla médicos
                if ($tipo_usuario === 'medico') {
                    $sql2 = "INSERT INTO medicos (especialidad, colegiado, id_usuario) 
                            VALUES ('$especialidad', '$colegiado', $id_usuario)";
                    
                    if ($conexion->query($sql2) !== TRUE) {
                        throw new Exception('Error al registrar médico: ' . $conexion->error);
                    }
                }

                // Si todo sale bien, confirmar la transacción
                $conexion->commit();
                echo json_encode(['status' => 'success', 'message' => 'Usuario registrado con éxito.']);
            } else {
                throw new Exception('Error al registrar usuario: ' . $conexion->error);
            }
        } catch (Exception $e) {
            // Si hay error, revertir la transacción
            $conexion->rollback();
            echo json_encode(['status' => 'error', 'message' => $e->getMessage()]);
        }
    }
} else {
    echo json_encode(['status' => 'error', 'message' => 'Alguno de los campos está vacío.']);
}

// Cerrar la conexión
$conexion->close();
?>