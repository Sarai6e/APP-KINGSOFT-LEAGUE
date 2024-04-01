<!DOCTYPE html>
<html>
<head>
    <title>Registrarse</title>
    <style>
        body {
            background-color: #f2f2f2;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        
        #register-form {
            background-color: rgba(255, 255, 255, 0.8);
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            text-align: center;
            margin-top: 100px; /* Ajusta el margen superior */
            max-width: 500px; /* Ancho máximo del formulario */
            margin-left: auto;
            margin-right: auto;
        }
        
        h2 {
            color: #333;
        }
        
        label {
            color: #333;
            display: block;
            margin-top: 10px;
            text-align: left;
        }
        
        input[type="text"],
        input[type="password"],
        input[type="email"],
        input[type="number"],
        select {
            width: 100%;
            padding: 10px;
            margin: 5px 0;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
        }
        
        input[type="submit"] {
            width: 50%;
            padding: 10px;
            margin-top: 10px;
            background-color: #4CAF50;
            color: white;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s;
        }
        
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        
        .error-message {
            color: #ff0000;
            margin-top: 5px;
        }
    </style>

</head>
<body>
<?php 
    include 'navegador.php';
?>
    <form id="register-form" action="registrar_usuario.php" method="post">
        <h2>Registrarse</h2>
        <label for="nombre">Nombre:</label>
        <input type="text" name="nombre" id="nombre" required>
        <label for="apellido">Apellido:</label>
        <input type="text" name="apellido" id="apellido" required>
        <label for="dni">DNI:</label>
        <input type="text" name="dni" id="dni" required>
        <label for="genero_id">Género:</label>
        <select name="genero_id" id="genero_id">
            <option value="1">Masculino</option>
            <option value="2">Femenino</option>
        </select>
        <label for="grado_estudio_id">Grado de estudio:</label>
        <select name="grado_estudio_id" id="grado_estudio_id">
            <option value="1">Secundaria</option>
            <option value="2">Universidad</option>
        </select>
        <label for="año_estudio">Año de estudio:</label>
        <input type="number" name="año_estudio" id="año_estudio" required>
        <label for="especialidad">Especialidad:</label>
        <input type="text" name="especialidad" id="especialidad" required>
        <label for="correo">Correo:</label>
        <input type="email" name="correo" id="correo" required>
        <label for="clave">Clave:</label>
        <input type="password" name="clave" id="clave" required>
        <label for="robot_id">ID del robot:</label>
        <input type="number" name="robot_id" id="robot_id" required>
        <label for="club_robotica_id">ID del club de robótica:</label>
        <input type="number" name="club_robotica_id" id="club_robotica_id" required>
        <label for="fecha_nacimiento">Fecha de nacimiento:</label>
        <input type="date" name="fecha_nacimiento" id="fecha_nacimiento" required>
        <input type="submit" value="Registrarse">
        <p>¿Ya tienes una cuenta? <a href="login.php">Iniciar Sesión</a></p>
    </form>

</body>
</html>
