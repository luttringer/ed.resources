<?php
    header('Content-Type: application/json');

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