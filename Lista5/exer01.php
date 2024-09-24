<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Exercício 1</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
    <h1>Exercício 1: mapa ordenado com nome e telefone</h1>
    <form action="" method="POST">
        <?php for ($i = 1; $i <= 5; $i++) : ?>
            <input type="text" name="nomes[]" placeholder="Nome <?= $i ?>">
            <input type="text" name="fones[]" placeholder="Fone <?= $i ?>">
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
            $nomes = $_POST['nomes'];
            foreach ($nomes as $indice_n => $n) {
            #foreach ($array as $chave => $valor) 
            #$array: O array que está sendo percorrido.
            #$chave: Armazena a chave atual (o índice do array, se for numérico, ou a chave de um array associativo).
            #$valor: Armazena o valor correspondente à chave atual.
                foreach ($nomes as $indice_m => $m) {
                    if ($indice_n !== $indice_m && $n == $m) {
                        echo "<p>$n é uma chave duplicada.</p>";
                    }
                }
            }

            $fones = $_POST['fones'];
            foreach ($fones as $indice_a => $a) {
                foreach ($fones as $indice_b => $b) {
                    if ($indice_a !== $indice_b && $a == $b) {
                        echo "<p>$a é um valor duplicado.</p>";
                    }
                }
            }
            $contatos = [];
            for ($i = 0; $i < count($nomes); $i++) {
                if (!empty($nomes[$i]) && !empty($fones[$i])) {
                    $contatos[$nomes[$i]] = $fones[$i];
                }
            }
            foreach ($contatos as $nomes => $fones) {
                echo "<p>Na posição $nomes temos o telefone: $fones.</p>";
            }
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }
    ?>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>