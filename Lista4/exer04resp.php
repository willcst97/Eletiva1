<?php

declare(strict_types=1); ?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Resposta do exercício 4</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <main class="container">
    <h1>Resposta do exercício 4</h1>
    <?php
    function verificarData($d, $m, $y): void
    {
      if (checkdate($m, $d, $y) == true) {
        echo "<h3>$d/$m/$y é uma data válida.</h3>";
      } else {
        echo "<h3>$d/$m/$y não é uma data válida.</h3>";
      }
    }
    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
      try {
        $dia = (int) $_POST['valor1'];
        $mes = (int) $_POST['valor2'];
        $ano = (int) $_POST['valor3'];
        verificarData($dia, $mes, $ano);
      } catch (Exception $e) {
        echo "Erro! " . $e->getMessage();
      }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </main>
</body>

</html>