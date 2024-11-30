<?php

declare(strict_types=1);

require_once '../config/bancodedados.php';

function buscarDadosDeAdocoes(): array
{
    global $pdo;
    $stmt = $pdo->query("SELECT DATE_FORMAT(data, '%Y-%m') as mes, COUNT(*) as total 
                                    FROM adocao GROUP BY mes ORDER BY mes");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarAdocoes(): array
{
    global $pdo;
    $stmt = $pdo->query("SELECT adocao.*, adotante.nome as adotante_nome, animal.nome as animal_nome, ong.nome as ong_nome FROM adocao
                        INNER JOIN adotante ON adotante.id = adocao.adotante_id
                        INNER JOIN animal ON animal.id = adocao.animal_id
                        INNER JOIN ong ON ong.id = animal.ong_id");
    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function buscarAdocaoPorId(int $id): ?array
{
    global $pdo;
    $stmt = $pdo->prepare("SELECT a.id, a.data, a.aprovacao_ong, a.ressalva, adot.nome AS adotante_nome, ani.nome AS animal_nome FROM adocao a JOIN adotante adot ON a.adotante_id = adot.id JOIN animal ani ON a.animal_id = ani.id WHERE a.id = ?");
    $stmt->execute([$id]);
    $adocao = $stmt->fetch(PDO::FETCH_ASSOC);
    return $adocao ?: null;
}

function criarAdocao(int $adotante_id, int $animal_id, string $data, int $aprovacao_ong, string $ressalva): bool
{
    global $pdo;
    $stmt = $pdo->prepare("INSERT INTO adocao (adotante_id, animal_id, data, aprovacao_ong, ressalva) VALUES (?, ?, ?, ?, ?)");
    return $stmt->execute([$adotante_id, $animal_id, $data, $aprovacao_ong, $ressalva]);
}

function alterarAdocao(int $id, int $adotante_id, int $animal_id, string $data, int $aprovacao_ong, string $ressalva): bool
{
    global $pdo;
    $stmt = $pdo->prepare("UPDATE adocao SET adotante_id = ?, animal_id = ?, data = ?, aprovacao_ong = ?, ressalva = ? WHERE id = ?");
    return $stmt->execute([$adotante_id, $animal_id, $data, $aprovacao_ong, $ressalva, $id]);
}

function excluirAdocao(int $id): bool
{
    global $pdo;
    $stmt = $pdo->prepare("DELETE FROM adocao WHERE id = ?");
    return $stmt->execute([$id]);
}
