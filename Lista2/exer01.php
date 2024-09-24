<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercício 1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <?php
  #include("nav.php"); essa função, se o arquivo citado não for encontrado, ele exibe um erro e continua exibindo restante da página
  require("nav.php"); #já essa função, se o arq não for encontado, ele não exibe o restante da página. Ele requer validação do arq para mostrar o resto da página
  #include_once("nav.php") ou  require_once("arq"); se for insirido mais de uma vez, ele não mostra mais de uma vez o mesmo arquivo
  ?>
  <main class="container">
    <h1>Exercício 1</h1>
    <form action="exer01resp.php" method="post">
      <div class="row">
        <div class="col">
          <label for="valor1" class="form-label">Informe o valor 1:</label>
          <input type="number" class="form-control" name="valor1" id="valor1">
        </div>
        <div class="col">
          <label for="valor2" class="form-label">Informe o valor 2:</label>
          <input type="number" class="form-control" name="valor2" id="valor2">
        </div>
      </div>
      <div class="row">
        <div class="col">
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
      </div>
    </form>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>