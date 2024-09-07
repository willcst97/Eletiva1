<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body class="container">
    <h1>Exercício 2: soma ou triplo da soma</h1>
    <p>Cálculo da soma dos dois valores de entrada. Se os dois valores forem iguais, retronará o triplo da soma.</p>
    <form action="exer02resp.php" method="post">
        <div class="row mt-2"> 
            <div class="col">
                <label for="valor1" class="form-label">Informe o valor 1:</label>
                <input type="text" class="form-control" name="valor1" id="valor1">
            </div>
            <div class="col">
                <label for="valor2" class="form-label">Informe o valor 2:</label>
                <input type="text" class="form-control" name="valor2" id="valor2">
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