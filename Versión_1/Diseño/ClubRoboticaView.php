<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Clubes de Robótica</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1 class="mt-4 mb-4">Clubes de Robótica</h1>
        <table class="table">
            <thead class="thead-dark">
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Ciudad</th>
                    <th>País</th>
                    <th>Logo</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php
                require_once 'ClubRoboticaController.php';

                $db = new PDO('mysql:host=localhost;dbname=datosks', 'root', '');
                $controller = new ClubRoboticaController($db);

                // Ver todos los clubes
                $clubs = $controller->index();

                while ($club = $clubs->fetch(PDO::FETCH_ASSOC)) :
                ?>
                    <tr>
                        <td><?php echo $club['id']; ?></td>
                        <td><?php echo $club['nombre']; ?></td>
                        <td><?php echo $club['ciudad']; ?></td>
                        <td><?php echo $club['pais']; ?></td>
                        <td><img src="data:image/jpeg;base64,<?php echo base64_encode($club['logo']); ?>" alt="Logo del club" width="100"></td>
                        <td>
                            <a href="ver.php?id=<?php echo $club['id']; ?>" class="btn btn-info btn-sm">Ver</a>
                            <a href="editar.php?id=<?php echo $club['id']; ?>" class="btn btn-primary btn-sm">Editar</a>
                            <a href="eliminar.php?id=<?php echo $club['id']; ?>" class="btn btn-danger btn-sm">Eliminar</a>
                        </td>
                    </tr>
                <?php endwhile; ?>
            </tbody>
        </table>
        <a href="menulogin.html" class="btn btn-secondary">Volver</a>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
