<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Resposta do exercício 16</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
  <h1>Resposta do exercício 16</h1>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    try {
      $valor1 = (float) $_POST['valor1'] ?? 0;
      $valor2 = (float) $_POST['valor2'] ?? 0;
      $resultado = number_format($valor1 - ($valor2 / 100), 2, ',', '.');
      echo "<h3>R$ " . $valor1." - ".$valor2 . "% de desconto = R$" . $resultado . "</h3>";
    } catch (Exception $e) {
      echo "Erro! " . $e->getMessage();
    }
  }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>