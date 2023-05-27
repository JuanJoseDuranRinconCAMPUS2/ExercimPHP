<?php
    declare(strict_types=1);
    //ejemplo
    $color = "black"
    //ejemplo
    const COLORS = [
            "black", "brown", "red", "orange", "yellow",
            "green", "blue", "violet", "grey", "white"
        ];

    //el ejercicio obliga usar el const pero es mas recomendable usar el define()
    function colorCode(string $color): int
    {
        $indice = array_search($color, COLORS);
        return $indice;
    }
?>
