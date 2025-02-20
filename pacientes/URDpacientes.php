<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Vista Pacientes</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<style>
  body {
    font-family: 'Century Gothic';
    justify-content: center;
    align-items: center;
  }
  h1{
    color: #007BFF;
    font-size: 3em;
    margin-bottom: 2rem;
  }
  table{
    background-color:white;
  }
</style>

  <h1><b>Pacientes Registrados</b></h1>
    <div class="tablam">
      <div class="container">
      <table class="table table-striped table table-hover">
            <thead>
              <tr>
                <th>ID</th>
                <th>DPI</th>
                <th>Primer Nombre</th>
                <th>Segundo Nombre</th>
                <th>Primer Apellido</th>
                <th>Segundo Apellido</th>
                <th>Edad</th>
                <th>Genero</th>
                <th>Email</th>
                <th>Fecha de nacimiento</th>
                <th>Dirección</th>
                <th>Teléfono</th>
                <th>Observaciones</th>
                <th>ID Medico</th>
              </tr>
            </thead>
            <tbody>
                <?php
                session_start(); 
                // Conexión a la base de datos
                $conexion = mysqli_connect("localhost", "root", "", "bd_proyectodw") or die('Error al conectar con la Base de Datos');
                $conexion->set_charset("utf8");
                $sql = $conexion->query("SELECT * FROM pacientes");  
                while($datos = $sql->fetch_object()) {  
                ?>
                  <tr>
                    <td><?= $datos->id_paciente ?></td>
                    <td><?= $datos->dpi ?></td>
                    <td><?= $datos->primer_nombre ?></td>
                    <td><?= $datos->segundo_nombre ?></td>
                    <td><?= $datos->primer_apellido ?></td>
                    <td><?= $datos->segundo_apellido ?></td>
                    <td><?= $datos->edad ?></td>
                    <td><?= $datos->genero ?></td>
                    <td><?= $datos->email ?></td>
                    <td><?= $datos->fecha_nacimiento ?></td>
                    <td><?= $datos->direccion ?></td>
                    <td><?= $datos->telefono ?></td>
                    <td><?= $datos->observaciones ?></td>
                    <td><?= $datos->id_medico ?></td>
                    <td>
                      <a href="EditarPac.php?id=<?= $datos->id_paciente ?>"><img src="Img/Icons/edit.png" alt="Editar" width="30" height="30"></a>
                       
                      <a href="DeletePac.php?id=<?= $datos->id_paciente ?>"><img src="Img/Icons/delete.png" alt="Eliminar" width="30" height="30"></a>
                    </td>
                  </tr>
                <?php } ?>
            </tbody>
          </table>
      </div>    
        <a href="MenuPacientes.html" id="Regreso">
          <img src="img/Icons/izquierda2.png" alt="Regresar" class="imgRegreso">
       </a>
    </div>
</body>
</html>

<style>
  h1{
    margin: 0 auto;
    width: 100%;
    text-align: center;
    padding: 3rem;
  }

  body{
    font-family: 'Century Gothic';
  }
  
.imgRegreso {
    position: absolute;  /* Posiciona el elemento de manera absoluta */
    top: 10px;           /* Ajusta la distancia desde la parte superior */
    left: 10px;          /* Ajusta la distancia desde el lado izquierdo */
    width: 40px;         /* Ajusta el tamaño de la imagen si es necesario */
    height: auto;
}

#Regreso {
    text-decoration: none; /* Quita subrayado del enlace */
}

</style>