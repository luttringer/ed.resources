<?php
    header('Content-Type: application/json');

    if (isset($_POST['user']) && isset($_POST['pass'])) 
    {
        $usuario = $_POST['user'];
        $contrasena = $_POST['pass'];

        try 
        {
            $pdo = new PDO('mysql:host=127.0.0.1;dbname=usuarioSample', 'root', '');
            $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $stmt = $pdo->prepare('SELECT COUNT(*) FROM usuario WHERE usuario = :usuario AND contrasena = :contrasena');
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