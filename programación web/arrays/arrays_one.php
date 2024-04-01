<?php
    $array_nombres = 
    [
        "primero" => "christian",
        "segundo" => "ezequiel"
    ];
    
    print_r($array_nombres);
    
    //agrego un elemento, sin key asociativa (por default sera 0 pues, y con valor "carl")
    array_push($array_nombres,"carl");
    print_r($array_nombres);
    
    //elimino el ultimo elemento del array, o sea, "carl"
    array_pop($array_nombres);
    print_r($array_nombres);
    
    //agrego un elemento con key y value
    $array_nombres["apellido"] = "menendez";
    print_r($array_nombres);
    
    
    //declaro una estructura condicional  if que verifica si existe un elemento con valor "christian"
    //en $array_nombres. de ser asi utilizo el metodo array_search para obtener su key.
    
    if(in_array("christian", $array_nombres))
    {
        echo "en el array: array_nombres existe un dato con value: \"christian\"";
        echo "\n" . "su key es: " . array_search("christian", $array_nombres);
    }
?>