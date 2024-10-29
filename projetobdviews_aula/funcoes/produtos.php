<?php
    declare(strict_types=1);
    require_once '../config/bancodedados.php';

    function buscarProdutos(): array {
        global $pdo;
        $stmt = $pdo->query("SELECT p.*, c.nome as nome_categoria FROM produto p INNER JOIN categoria c ON c.id = p.cateria_id");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function buscarProdutoPorId(int $id): ?array {
        global $pdo;
        $stmt = $pdo->prepare("SELECT p.*, c.nome as nome_categoria FROM produto p INNER JOIN categoria c ON c.id = p.cateria_id WHERE p.id = ?");
        $stmt->execute([$id]);
        $produto = $stmt->fetch(PDO::FETCH_ASSOC);
        return $produto ? $produto : null;
    }

    function criarProduto(string $nome, string $descricao, float $preco, int $estoque_min, int $categoria_id): bool {

    }

    function alterarProduto(int $id, string $nome, string $descricao, float $preco, int $estoque_min, int $categoria_id): bool {

    }

    function excluirProduto(int $id): bool {

    }
?>