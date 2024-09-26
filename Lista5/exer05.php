<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 5</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
    <h1>Exercício 4: mapa ordenado de livros.</h1>
    <form action="" method="POST">
        <?php for ($i = 1; $i <= 5; $i++) : ?>
            <div class="row mt-2">
                <div class="row shadow p-3 mb-5 bg-body-tertiary rounded">
                    <h5 class="row mb-3"><?= $i ?>º livro:</h5>
                    <div class="col">
                        <input type="text" class="form-control" name="titulos[]" placeholder="Título">
                    </div>
                    <div class="col-2">
                        <input type="text" class="form-control" name="qtd[]" placeholder="Quantidade">
                    </div>
                </div>
            </div>
        <?php endfor; ?>
        <div class="row mb-4">
            <div class="col">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        try {
            $nomes = $_POST['titulos'];
            $qtd = $_POST['qtd'];
            $livros = [];
            for ($i = 0; $i < count($nomes); $i++) {
                $livros[$nomes[$i]] = (float)$qtd[$i];
            }
            ksort($livros);
            foreach ($livros as $nomes => $qtd) {
                if ($qtd < 5) {
                    echo "<p>Produto: $nomes | Quantidade: $qtd. ATENÇÃO: Quantidade menor que 5!</p>";
                } else {
                    echo "<p>Produto: $nomes | Quantidade: $qtd.</p>";
                }
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>