<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 2</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
    <h1>Exercício 2: mapa ordenado com nomes e médias das notas.</h1>
    <form action="" method="POST">
        <?php for ($i = 1; $i <= 3; $i++) : ?>
            <div class="row mt-2">
                <div class="row shadow p-3 mb-5 bg-body-tertiary rounded">
                    <h5 class="row mb-3"><?= $i ?>º aluno(a):</h5>
                    <div class="col">
                        <input type="text" class="form-control" name="nomes[]" placeholder="Nome">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" name="nota1" placeholder="Nota 1">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" name="nota2" placeholder="Nota 2">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" name="nota3" placeholder="Nota 3">
                    </div>
                </div>
            </div>
        <?php endfor; ?>
        <div class="row mt-4 mb-4">
            <div class="col">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        try {
            $nota1 = (float) $_POST['nota1'] ?? 0;
            $nota2 = (float) $_POST['nota2'] ?? 0;
            $nota3 = (float) $_POST['nota3'] ?? 0;
            $media = ($nota1 + $nota2 + $nota3) / 3;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>