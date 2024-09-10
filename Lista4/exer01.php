<!doctype html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Exercício 1</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body>
  <main class="container">
    <h1>Exercício 1: contador de caracteres</h1>
    <p>Informe uma palavra e terá de retorno o número de caracteres desta palavra.</p>
    <form action="exer01resp.php" method="post">
      <div class="row mt-2">
        <div class="col-6">
          <label for="palavra" class="form-label">Informe a palavra:</label>
          <input type="text" class="form-control" name="palavra" id="palavra">
        </div>
      </div>
      <div class="row mt-4">
        <div class="col">
          <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
      </div>
    </form>
  </main>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>