<?php

declare(strict_types=1); ?>
<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Resposta do exercício 1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
  <main class="container">
    <h1>Resposta do exercício 1</h1>
    <?php
    function contarCaracteres(string $palavra):int
    {
      return strlen($palavra);
    }

    if ($_SERVER["REQUEST_METHOD"] == 'POST') {
      try {
        $palavra = (string) $_POST['palavra'];
        echo "<h3>$palavra contém ".contarCaracteres($palavra)." caracter(es).</h3>";
      } catch (Exception $e) {
        echo "Erro! " . $e->getMessage();
      }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </main>
</body>

</html>