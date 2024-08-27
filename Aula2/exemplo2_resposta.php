<!doctype html>
<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Resposta</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>

<body class="container">
    <?php
    if ($_SERVER['REQUEST_METHOD'] == "POST") {
        try {
            $valor = (int) $_POST['valor'] ?? 0;
            switch ($valor) {
                case 10:
                    echo "Nota A";
                    break;
                case 9:
                    echo "Nota B";
                    break;
                case 8:
                    echo "Nota C";
                    break;
                case 7:
                    echo "Nota D";
                    break;
                default:
                    echo "Nota E";
            }
            $dado = 1;
            $dado = ($dado >= 1) ? "Sim" : "Não"; //if de uma linha. Mesma coisa que:
            /*if ($dado >= 1)
                $dado = "Sim"
            else
                $dado = "Não"*/
            $i = 1;
            while ($i <= 5) {
                echo "$i \n";
                $i++;
            }
            $i = 0;
            do{
                echo "$i \n";
                $i++;
            }
            while ($i<=5);
            for ($i=0; $i<=5; $i++){
                echo "$i \n";
            }
        } catch (Exception $e) {
            echo "Erro: $e";
        }
    }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>