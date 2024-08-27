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
        if($_SERVER['REQUEST_METHOD'] == "POST")
        {
            try 
            {
                $valor = (int) $_POST['valor'] ?? 0;
                if($valor>0){//mesma lógica de c#: se for 1 linha, não é necessário {}
                    echo "Valor positivo";
                }
                elseif($valor<0)
                {
                    echo "Valor negativo";
                }
                else
                {
                    echo "Valor igual a zero!";
                }
            }
            catch (Exception $e)
            {
                echo "Erro: $e";
            }
        }
    ?>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>