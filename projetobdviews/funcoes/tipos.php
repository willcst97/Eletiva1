<?php

    declare(strict_types=1);

    require_once "../config/bancodedados.php";

    function buscarTipos() : array{
        global $pdo;
        $stmt = $pdo->query("SELECT * FROM tipo");
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
?>
