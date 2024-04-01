<?php
    $dinero = 333;
    $signo = "capricornio";
    
    if($dinero > 1000)
    {
        echo "tienes mas de 1000 pesos";
    }else 
    {
        echo "tienes 1000 pesos o menos.";
    }
    
    echo "\n";
    
    if($dinero <=100)
    {
        echo "tienes 100 o menos pesos";
    }elseif($dinero <=200)
    {
        echo "tienes entre 101 y 200 pesos";
    }
    elseif($dinero <=300)
    {
        echo "tienes entre 201 y 300 pesos";
    }else 
    {
        echo "tienes mas de 300 pesos";
    }
    
    echo "\n" . "\n";
    
    switch($signo)
    {
        case "capricornio":
            echo "tu signo es capricornio";
            break;
        case "tauro": 
            echo "tu signo es tauro";
            break;
        default:
            echo "tu signo no es capricornio ni tauro";
            break;
    }
    
?>