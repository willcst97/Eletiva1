<?php

declare(strict_types=1);

require_once '../config/bancodedados.php';

function gerarDadosGrafico(): array
{
    global $pdo;
    $stmt = $pdo->query("SELECT p.id, p.nome, SUM(c.quantidade) as estoque FROM compra c
                        INNER JOIN produto p ON p.id = c.produto_id GROUP BY p.id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarAnimais(): array
{
    global $pdo;
    $stmt = $pdo->query("SELECT p.*, c.nome as nome_categoria FROM produto p 
                        INNER JOIN categoria c ON c.id = p.categoria_id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarAnimalPorId(int $id): ?array
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT p.*, c.nome as nome_categoria FROM produto p 
                            INNER JOIN categoria c ON c.id = p.categoria_id WHERE p.id = ?");
    $stmt->execute([$id]);
    $produto = $stmt->fetch(PDO::FETCH_ASSOC);
    return $produto ? $produto : null;
}

function criarAnimal(string $nome, string $descricao, int $idade, int $tipo_id, int $ong_id): bool
{
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO produto (nome, descricao, idade,
                    tipo_id, ong_id) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$nome, $descricao, $idade, $tipo_id, $ong_id]);
}

function alterarAnimal(
    string $nome,
    string $descricao,
    int $idade,
    int $tipo_id,
    int $ong_id
): bool {
    global $pdo;
    $stmt = $pdo->prepare("UPDATE produto SET nome = ?, descricao = ?,
            tipo_id = ?, ong_id = ? WHERE id = ?");
    return $stmt->execute([$nome, $descricao, $idade, $tipo_id, $ong_id]);
}

function excluirAnimal(int $id): bool
{
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM produto WHERE id = ?");
    return $stmt->execute([$id]);
}
