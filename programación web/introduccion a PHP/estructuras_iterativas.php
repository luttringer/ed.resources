<?php
    echo "Bucle for:\n";
    for ($i = 0; $i < 5; $i++) {
        echo "El valor de i es: $i\n";
    }
    echo "\n\n";

    echo "Bucle while:\n";
    $j = 0;
    while ($j < 5) {
        echo "El valor de j es: $j\n";
        $j++;
    }
    echo "\n\n";

    echo "Bucle do-while:\n";
    $k = 0;
    do {
        echo "El valor de k es: $k\n";
        $k++;
    } while ($k < 5);
?>