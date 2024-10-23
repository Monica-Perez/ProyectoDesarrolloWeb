<?php
session_start();

// Verificar si el usuario está logueado, si no lo esta lo rediccionara al login
if (!isset($_SESSION['user']) || $_SESSION['tipo_usuario'] !== 'medico') {
    header('Location: index.html');
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Médico</title>
    <link rel="stylesheet" href="css/panelmedico.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.0.0/animate.min.css">
</head>
<body>
<div class="dashboard">
    <!-- Sidebar -->
    <div class="sidebar">
        <div class="profile">
            <img src="Img/usuario.png" alt="Doctor Profile">
            <h3><?php echo htmlspecialchars($_SESSION['user']); ?></h3>
            <p>Médico General</p>
        </div>
            
        <ul class="nav-menu">
            <li class="nav-item">
                <a href="panelmedico.php" class="nav-link">
                    <i class="fas fa-home"></i>
                    Inicio
                </a>
            </li>
            <li class="nav-item">
                <a href="pacientes/MenuPacientes.html" class="nav-link">
                    <i class="fas fa-user-injured"></i>
                    Pacientes
                </a>
            </li>
            <li class="nav-item">
                <a href="Citas.php" class="nav-link">
                    <i class="fas fa-calendar-alt"></i>
                    Citas
                </a>
            </li>
        </ul>
        <a href="logout.php" class="logout">
            <i class="fas fa-sign-out-alt"></i>
            Cerrar Sesión
        </a>
    </div>

    <!-- Main Content -->
    <div class="main-content">
        <div class="header">
            <h1>Panel de Control - Médico</h1>
            <p>Bienvenido de nuevo, Dr(a). <?php echo htmlspecialchars($_SESSION['user']); ?></p>
        </div>

        <div class="cards-grid">
            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-user-injured"></i>
                </div>
                <h3>Pacientes</h3>
                <p>Ver y Gestionar la lista de pacientes</p>
            </div>

            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-calendar-alt"></i>
                </div>
                <h3>Citas</h3>
                <p>Gestión de citas</p>
            </div>

            <div class="card">
                <div class="card-icon">
                    <i class="fas fa-prescription"></i>
                </div>
                <h3>Progreso de Citas</h3>
                <p>Verificar el progreso de las citas</p>
            </div>

        </div>
    </div>
    <style>
        
    </style>

</body>
</html>