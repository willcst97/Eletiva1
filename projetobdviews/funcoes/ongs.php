<?php

declare(strict_types=1);
require_once '../config/bancodedados.php';

function buscarOngs(): array
{
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM ong");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarOngPorId(int $id): ?array
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM ong WHERE id = ?");
    $stmt->execute([$id]);
    $ong = $stmt->fetch(PDO::FETCH_ASSOC);
    return $ong ? $ong : null;
}

function criarOng(string $nome, string $endereco, string $fone): bool
{
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO ong (nome, endereco, fone) VALUES (?, ?, ?)");
    return $stmt->execute([$nome, $endereco, $fone]);
}

function alterarOng(int $id, string $nome, string $endereco, string $fone): bool
{
    global $pdo;
    $stmt = $pdo->prepare("UPDATE ong SET nome = ?, endereco = ?, fone = ? WHERE id = ?");
    return $stmt->execute([$nome, $endereco, $fone, $id]);
}

function excluirOng(int $id): bool
{
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM ong WHERE id = ?");
    return $stmt->execute([$id]);
}
