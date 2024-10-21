<?php
session_start();

// Verificar si el usuario está logueado y es enfermero
if (!isset($_SESSION['user']) || $_SESSION['tipo_usuario'] !== 'enfermero') {
    header('Location: login.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Enfermero</title>
</head>
<body>
    <h1>Bienvenido Enfermero(a) <?php echo htmlspecialchars($_SESSION['user']); ?></h1>
    <!-- Contenido específico para enfermeros -->
    <div>
        <h2>Panel de Control - Enfermero</h2>
        <!-- Agrega aquí las funcionalidades específicas para enfermeros -->
        <ul>
            <li><a href="registrar_signos.php">Registrar Signos Vitales</a></li>
            <li><a href="ver_pacientes_asignados.php">Ver Pacientes Asignados</a></li>
            <li><a href="registro_medicamentos.php">Registro de Medicamentos</a></li>
        </ul>
    </div>
    <a href="logout.php">Cerrar Sesión</a>
</body>
</html>