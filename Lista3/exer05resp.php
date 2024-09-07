<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Resposta do exercício 5</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
  <h1>Resposta do exercício 5</h1>
  <?php
  if ($_SERVER["REQUEST_METHOD"] == 'POST') {
    try {
      $valor = (int) $_POST['valor'] ?? 0;
      switch ($valor) {
        case 1:
          echo "<h3>1 refere-se a Janeiro</h3>";
          break;
        case 2:
          echo "<h3>2 refere-se a Fevereiro</h3>";
          break;
        case 3:
          echo "<h3>3 refere-se a Março</h3>";
          break;
        case 4:
          echo "<h3>4 refere-se a Abril</h3>";
          break;
        case 5:
          echo "<h3>5 refere-se a Maio</h3>";
          break;
        case 6:
          echo "<h3>6 refere-se a Junho</h3>";
          break;
        case 7:
          echo "<h3>7 refere-se a Julho</h3>";
          break;
        case 8:
          echo "<h3>8 refere-se a Agosto</h3>";
          break;
        case 9:
          echo "<h3>9 refere-se a Setembro</h3>";
          break;
        case 10:
          echo "<h3>10 refere-se a Outubro</h3>";
          break;
        case 11:
          echo "<h3>11 refere-se a Novembro</h3>";
          break;
        case 12:
          echo "<h3>12 refere-se a Dezembro</h3>";
          break;
        default:
          echo "<h3>Válido apenas número de 1 a 12!</h3>";
      }
    } catch (Exception $e) {
      echo "Erro! " . $e->getMessage();
    }
  }
  ?>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>