<?php
session_start();

// Verificar si el usuario está autenticado y tiene los permisos necesarios
function verificar_autenticacion($rol_permitido = null) {
    // Redirigir a la página de inicio de sesión si el usuario no está autenticado
    if (!isset($_SESSION['usuario_id'])) {
        header("Location: login.php");
        exit();
    }

    // Verificar el rol permitido si se especifica
    if ($rol_permitido !== null && $_SESSION['rol'] !== $rol_permitido) {
        // Si el usuario no tiene el rol permitido, redirigir a una página de acceso denegado
        header("Location: acceso_denegado.php");
        exit();
    }
}

// Establecer variables de sesión para identificar el rol y el ID del usuario al autenticar
function establecer_sesion($id_usuario, $rol) {
    $_SESSION['usuario_id'] = $id_usuario;
    $_SESSION['rol'] = $rol;
}

// Filtrar datos según el rol del usuario
function filtrar_datos_segun_rol($datos, $id_usuario) {
    // Si el usuario es el dueño (ID 1), devolver todos los datos sin filtrar
    if ($id_usuario == 1) {
        return $datos;
    }
    // Si el usuario es un participante, filtrar solo sus propios datos
    else {
        return array_filter($datos, function ($dato) use ($id_usuario) {
            return $dato['usuario_id'] == $id_usuario;
        });
    }
}
?>
