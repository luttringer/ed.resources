<?php
    //declaracion variables y constante
    $nombre;   
    $apellido = "menendez";
    $cantidad_ojos = 2;
    $altura = 1.80;
    $nombre = "christian";     
    define("PASION", "ajedrez Y programación");    
    
    //echo imprime un mensaje conjunto aprovechando el operador de concatenacion . para "integrar" textos planos como "bienvenido" con variables como $nombre
    echo 'bienvenido ' . $nombre . ' ' . $apellido . '.';
    echo "\n" . "\n" . "\n";        //imprimo en consola tres saltos de linea 

    $pasion = PASION;       //declaro una variable $pasion que tome los datos de la constante PASION. esto para utilizarla dentro de heredoc (EOT)
    
    //declaro una variable $datos con heredoc el cual nos permite integrar mas facilmente varias lineas de texto junto a variables (no constantes)
    $datos = <<<EOT
    tus datos adicionales son:
    -cantidad de ojos : $cantidad_ojos
    -altura : $altura
    -apellido: $apellido
    -y tu pasion es : $pasion
    EOT;

    echo $datos;
    echo "\n" . "\n" . "\n";

    //informacion legible y comprensible sobre la variable $altura
    print_r($altura);

    echo "\n" . "\n" . "\n";

    //informacion detallada sobre la variable $altura
    var_dump($altura);
?>