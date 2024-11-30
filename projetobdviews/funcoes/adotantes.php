<?php

declare(strict_types=1);

require_once '../config/bancodedados.php';

function buscarAdotantes(): array 
{
    global $pdo;
    $stmt = $pdo->query("SELECT * FROM adotante");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarAdotantePorId(int $id): ?array 
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT * FROM adotante WHERE id = ?");
    $stmt->execute([$id]);
    $adotante = $stmt->fetch(PDO::FETCH_ASSOC);
    return $adotante ? $adotante : null;
}

function criarAdotante(string $nome, string $endereco, int $idade, string $fone, string $email): bool
{
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO adotante (nome, endereco, idade, fone, email) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$nome, $endereco, $idade, $fone, $email]);
}

function alterarAdotante(int $id, string $nome, string $endereco, int $idade, string $fone, string $email): bool
{
    global $pdo;
    $stmt = $pdo->prepare("UPDATE adotante SET nome = ?, endereco = ?, idade = ?, fone = ?, email = ? WHERE id = ?");
    return $stmt->execute([$nome, $endereco, $idade, $fone, $email, $id]);
}

function excluirAdotante(int $id): bool
{
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM adotante WHERE id = ?");
    return $stmt->execute([$id]);
}
