<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Resposta do exercício 1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <h1>Resposta do exercício 1</h1>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    try {
      $valor1 = (int) $_POST['valor1'] ?? 0;
      $valor2 = (int) $_POST['valor2'] ?? 0;
      $valor3 = (int) $_POST['valor3'] ?? 0;
      $valor4 = (int) $_POST['valor4'] ?? 0;
      $valor5 = (int) $_POST['valor5'] ?? 0;
      $valor6 = (int) $_POST['valor6'] ?? 0;
      $valor7 = (int) $_POST['valor7'] ?? 0;
      $menor = min($valor1, $valor2, $valor3, $valor4, $valor5, $valor6, $valor7);
      echo "<p>Menor valor: $menor</p>";
    } catch (Exception $e) {
      echo "Erro! " . $e->getMessage();
    }
  }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>