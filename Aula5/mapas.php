<?php
    $frutas = array("morango", "maca", "abacaxi"); //mapa 'frutas' com 3 posições (0, 1, 2) receberá os parâmetros citados
    echo "<p>".$frutas[0]."</p>";
    $frutas[0] = "laranja"; //mapa 'frutas' na posição '0' substituirá 'morango' por 'laranja'
    echo "<p>".$frutas[0]."</p>";
    $frutas["fruta"] = 15; //mapa 'frutas' numa nova posição 'fruta' receberá '15'
    echo "<p>".$frutas["fruta"]."</p>";
    $cores[0] = "azul"; //mapa 'cores' na posição '0' irá receber 'azul'
    $cores["cor"] = "laranja"; //mapa 'cores' na posição 'cor' irá receber 'laranja'

    $mapa = [
        "valor1" => 1,
        "valor2" => 2,
        "valor3" => 3,
    ];

    asort($frutas); //ordenar o mapa pelo valor
    #ksort($frutas); //ordenar o mapa pela chave

    var_dump($cores);
    echo "<p></p>";
    print_r($mapa);

    //foreach($frutas as $valor);
    foreach($frutas as $chave => $valor){
        echo "<p>Na posição $chave temos a fruta: $valor.</p>";
    }

    echo "<p>Quantidade"
?>