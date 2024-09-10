<?php

declare(strict_types=1); ?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Resposta do exercício 7</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <main class="container">
    <h1>Resposta do exercício 7</h1>
    <?php
    function dataExtenso($d, $m, $y):string{
      return "$d/$m/$y;";
    }
    function contarDias(string $data1, string $data2): void
    {

      $dt1 = date_create($data1);
      $dt2 = date_create($data2);
      $diferenca = date_diff($dt1,$dt2);
      echo "<h3>A diferença entra $data1 e $data2 é de ".$diferenca->format('%a')." dias.</h3>";
    }
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
      try {
        $data1 = $_POST['valor3'] ."-". $_POST['valor2'].'-'.$_POST['valor1'];
        $data2 = $_POST['valor6'] ."-". $_POST['valor5'].'-'.$_POST['valor4'];
        contarDias($data1, $data2);
      } catch (Exception $e) {
        echo "Erro! " . $e->getMessage();
      }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </main>
</body>

</html>