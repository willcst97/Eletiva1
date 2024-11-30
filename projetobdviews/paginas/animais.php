<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';  
    require_once '../funcoes/animais.php';
    
    $animais = buscarAnimais();
?>

<div class="container mt-5">
    <h2>Gerenciamento de Animais</h2>
    <a href="novo_animal.php" class="btn btn-success mb-3">Cadastrar Animal</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Idade</th>
                <th>Tipo</th>
                <th>ONG Responsável</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach($animais as $a) : ?>
            <tr>
                <td><?= $a['id'] ?></td>
                <td><?= $a['nome'] ?></td>
                <td><?= $a['descricao'] ?></td>
                <td><?= $a['idade'] ?></td>
                <td><?= $a['tipo_descricao'] ?></td>
                <td><?= $a['ong_nome'] ?></td>
                <td>
                    <a href="editar_animal.php?id=<?= $a['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="excluir_animal.php?id=<?= $a['id'] ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
