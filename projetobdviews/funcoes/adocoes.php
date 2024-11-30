<?php

declare(strict_types=1);

require_once '../config/bancodedados.php';

function gerarDadosGrafico(): array
{
    global $pdo;
    $stmt = $pdo->query("SELECT ong.id, ong.nome, COUNT(adocao.id) as numero_adocoes FROM adocao
                        INNER JOIN animal ON animal.id = adocao.animal_id
                        INNER JOIN ong ON ong.id = animal.ong_id
                        GROUP BY ong.id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarAnimais(): array
{
    global $pdo;
    $stmt = $pdo->query("SELECT animal.*, tipo.nome as tipo_nome, ong.nome as ong_nome FROM animal
                        INNER JOIN tipo ON tipo.id = animal.tipo_id
                        INNER JOIN ong ON ong.id = animal.ong_id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarAnimalPorId(int $id): ?array
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT animal.*, tipo.nome as tipo_nome, ong.nome as ong_nome FROM animal
                            INNER JOIN tipo ON tipo.id = animal.tipo_id
                            INNER JOIN ong ON ong.id = animal.ong_id
                            WHERE animal.id = ?");
    $stmt->execute([$id]);
    $animal = $stmt->fetch(PDO::FETCH_ASSOC);
    return $animal ? $animal : null;
}

function criarAnimal(string $nome, string $descricao, int $idade, int $tipo_id, int $ong_id): bool
{
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO animal (nome, descricao, idade, tipo_id, ong_id) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$nome, $descricao, $idade, $tipo_id, $ong_id]);
}

function alterarAnimal(int $id, string $nome, string $descricao, int $idade, int $tipo_id, int $ong_id): bool
{
    global $pdo;
    $stmt = $pdo->prepare("UPDATE animal SET nome = ?, descricao = ?, idade = ?, tipo_id = ?, ong_id = ? WHERE id = ?");
    return $stmt->execute([$nome, $descricao, $idade, $tipo_id, $ong_id, $id]);
}

function excluirAnimal(int $id): bool
{
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM animal WHERE id = ?");
    return $stmt->execute([$id]);
}
