<?php
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';    
?>

<div class="container mt-5">
    <h2>Gerenciamento de Adoções</h2>
    <a href="nova_adocao.php" class="btn btn-success mb-3">Registrar Adoção</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Data</th>
                <th>Adotante</th>
                <th>Animal</th>
                <th>Aprovação da ONG</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach($adocoes as $adocao) : ?>
            <tr>
                <td><?= $adocao['id'] ?></td>
                <td><?= $adocao['data'] ?></td>
                <td><?= $adocao['adotante_nome'] ?></td>
                <td><?= $adocao['animal_nome'] ?></td>
                <td><?= $adocao['aprovacao_ong'] == 1 ? 'Aprovado!' : ($adocao['aprovacao_ong'] == 2 ? 'Reprovado!' : 'Pendente') ?></td>
                <td>
                    <a href="editar_adocao.php?id=<?= $adocao['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="excluir_adocao.php?id=<?= $adocao['id'] ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php require_once 'rodape.php'; ?>
