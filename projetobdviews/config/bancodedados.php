<div class="container text-center">
    <div class="col">
        <div class="row mt-3">
            <?php

            $host = "localhost";
            $db = "banco_php";
            $usuario = "root";
            $senha = "";
            $port = "3306";

            try {
                $pdo = new PDO(
                    "mysql:host=$host;port=$port;dbname=$db",
                    $usuario,
                    $senha
                );
                if ($pdo) {
                    echo "Conexão com o banco de dados realizada com sucesso!";
                } else {
                    echo "Erro ao conectar o banco de dados!";
                }
            } catch (Exception $e) {
                echo "Erro: " . $e->getMessage();
            }
            ?>
        </div>
    </div>
</div>