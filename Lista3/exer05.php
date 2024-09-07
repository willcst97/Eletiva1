<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercício 5</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
  <h1>Exercício 5: nome do mês</h1>
  <p>Informe um valor de 1 a 12 e terá o mês relacionado ao número informado como retorno.</p>
  <form action="exer05resp.php" method="post">
    <div class="row mt-2">
      <div class="col-6">
        <label for="valor" class="form-label">Informe o valor:</label>
        <input type="text" class="form-control" name="valor" id="valor">
      </div>
    </div>
    <div class="row mt-4">
      <div class="col">
        <button type="submit" class="btn btn-primary">Enviar</button>
      </div>
    </div>
  </form>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>