<?php
    header('Content-Type: application/json');

    /*
        documentacion: configuro el header de php para recibir y enviar archivos en formato json. luego consulto con un if si existen datos recibidos por POST (usr y pass)
            si existen los cargo en dos variables. dentro de un try (intenta correr el codigo, si hay error no se rompe sino que lo registra) configuro una conexion a bd mediante PDO
            y creo una consulta que evalua si existe un usuario en la tabla usuarios, con el user y pass que recibi. recorro la respuesta de la consulta y si devolvio 1 o mas, entonces devuelvo un json
            con el atributo exist en true (en js luego esto se evalua), sino en false.
    */

    if (isset($_POST['user']) && isset($_POST['pass'])) 
    {
        $usuario = $_POST['user'];
        $contrasena = $_POST['pass'];

        try 
        {
            $pdo = new PDO('mysql:host=mysql;dbname=usuarioSample', 'root', 'test');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare('SELECT COUNT(*) FROM usuarios WHERE usuario = :usuario AND contrasena = :contrasena');
            $stmt->bindParam(':usuario', $usuario);
            $stmt->bindParam(':contrasena', $contrasena);
            $stmt->execute();

            $count = $stmt->fetchColumn();

            if ($count > 0) 
            {
                echo json_encode(['exists' => true]);
            } else 
            {
                echo json_encode(['exists' => false]);
            }
        } catch (PDOException $e) {
            echo json_encode(['error' => $e->getMessage()]);
        }
    } else {
        echo json_encode(['error' => 'Faltan parámetros']);
    }

?>