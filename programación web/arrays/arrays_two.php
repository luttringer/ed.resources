<?php
    // Definición de un array asociativo
    $array_two = [
        "nombre" => "María",
        "apellido" => "González",
        "edad" => 30,
        "ciudad" => "Madrid"
    ];

    // Imprimir el array
    echo "Array original:\n";
    print_r($array_two);
    echo "\n";

    // Agregar un nuevo elemento al array
    $array_two["profesion"] = "Ingeniera";
    echo "Array con nueva clave y valor:\n";
    print_r($array_two);
    echo "\n";

    // Verificar si una clave existe en el array
    $clave_buscada = "apellido";
    if (array_key_exists($clave_buscada, $array_two)) {
        echo "La clave '$clave_buscada' existe en el array.\n";
    } else {
        echo "La clave '$clave_buscada' no existe en el array.\n";
    }

    // Eliminar un elemento del array por clave
    $clave_eliminar = "edad";
    unset($array_two[$clave_eliminar]);
    echo "Array después de eliminar la clave '$clave_eliminar':\n";
    print_r($array_two);
    echo "\n";

    // Recorrer el array y mostrar su contenido
    echo "Recorrido del array:\n";
    foreach ($array_two as $clave => $valor) {
        echo "$clave: $valor\n";
    }
?>