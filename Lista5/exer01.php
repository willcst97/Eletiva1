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
        <div class="row mt-4">
            <div class="col">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </form>

    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        try {
            $nomes = $_POST['nomes'];
            foreach ($nomes as $n) {
                foreach ($nomes as $m) {
                    if($n==$m){
                        echo "<p>$n é uma chave duplicada.</p>";
                    }
                }
            }
            $fones = $_POST['fones'];
            foreach ($fones as $a) {
                foreach ($fones as $b) {
                    if($a==$b){
                        echo "<p>$a é uma chave duplicada.</p>";
                    }
                }
            }
            $contatos = [];
            for ($i = 1; $i <= 5; $i++){
                $frutas[0] = "laranja";
                $contatos
            }
            foreach($contatos as $nomes => $fones){
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