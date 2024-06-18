<?php
    header('Content-Type: application/json');

    #ves algun error?

    /*
        Documentación: 
        Configuro el header de PHP para recibir y enviar archivos en formato JSON. Luego, consulto con un if si existen datos recibidos por POST (usuario y contraseña).
        Si existen, los cargo en dos variables. Dentro de un try (intenta correr el código, si hay error no se rompe sino que lo registra) configuro una conexión a 
        la base de datos mediante PDO
        y creo una consulta que evalúa si ya existe un usuario en la tabla usuarios con el usuario recibido. Si no existe, inserto el nuevo usuario en la base de datos
        y devuelvo un JSON con el atributo 'success' en true, sino en false con un mensaje de error.
    */

    if (isset($_POST['user']) && isset($_POST['pass'])) {
        $usuario = $_POST['user'];
        $contrasena = $_POST['pass'];

        try {
            $pdo = new PDO('mysql:host=mysql;dbname=usuarioSample', 'root', 'test');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            // Verifico si el usuario ya existe
            $stmt = $pdo->prepare('SELECT COUNT(*) FROM usuarios WHERE usuario = :usuario');
            $stmt->bindParam(':usuario', $usuario);
            $stmt->execute();

            $count = $stmt->fetchColumn();

            if ($count > 0) {
                // El usuario ya existe
                echo json_encode(['success' => false, 'message' => 'El usuario ya existe']);
            } else {
                // Inserto el nuevo usuario
                $stmt = $pdo->prepare('INSERT INTO usuarios (usuario, contrasena) VALUES (:usuario, :contrasena)');
                $stmt->bindParam(':usuario', $usuario);
                $stmt->bindParam(':contrasena', $contrasena);
                $stmt->execute();

                echo json_encode(['success' => true]);
            }
        } catch (PDOException $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['error' => 'Faltan parámetros']);
    }
?>
