<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 3</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
    <h1>Exercício 3: mapa ordenado códigos, nomes e preços.</h1>
    <form action="" method="POST">
        <?php for ($i = 1; $i <= 3; $i++) : ?>
            <div class="row mt-2">
                <div class="row shadow p-3 mb-5 bg-body-tertiary rounded">
                    <h5 class="row mb-3"><?= $i ?>º produto:</h5>
                    <div class="col-3">
                        <input type="number" class="form-control" name="codigos[]" placeholder="Código">
                    </div>
                    <div class="col">
                        <input type="number" class="form-control" name="nome[]" placeholder="Nome">
                    </div>
                    <div class="col-2">
                        <input type="number" class="form-control" name="preco[]" placeholder="Preço">
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

            $cods = $_POST['codigos'];
            $nomes = $_POST['nome'];
            $precos = $_POST['preco'];
            $produtos = [];
            for ($i = 0; $i < count($nomes); $i++) {
                if ($precos[$i] > 100) {
                    $precos[$i] = $precos[$i] - ($precos[$i] * 0.10);
                }
                $produtos[$codigos[$i]] = ['nome' => $nomes[$i], 'preco' => $precos[$i]];
            }
            arsort($alunos);
            foreach ($alunos as $nome => $media) {
                echo "<p>Aluno: $nome. Média: $media</p>";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>