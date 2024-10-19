<?php
$host = "localhost";
$db = "banco_php";
$usuario = "root";
$senha = "";
$port = 3306;

try {
    $pdo = new PDO("mysql:host=$host;port=$port;dbname=$db", $usuario, $senha);
    if ($pdo) {
        echo "Conexão realizada com sucesso!";
    } else {
        echo "Erro ao conectar o banco de dados!";
    }
} catch (Exception $e) {
    echo "Erro: " . $e->getMessage();
}

?>

<!--
em C#:
Classe c = new Classe();
c.acao();

em PHP:
$c = new Classe();
$c->acao();

iniciar workbench, botão direito na casinha, criar base de dados banco_php, usar base de daos bonco_php, executar cód estrutura_banco

-->