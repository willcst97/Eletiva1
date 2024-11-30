<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';  
    require_once '../funcoes/animais.php';
    
    $produtos = buscarAnimais();
?>

<div class="container mt-5">
    <h2>Gerenciamento de Animais</h2>
    <a href="novo_produto.php" class="btn btn-success mb-3">Cadastrar Animal</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Descrição</th>
                <th>Idade</th>
                <th>Tipo</th>
                <th>ONG Responsável</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach($produtos as $p) : ?>
            <tr>
                <td><?= $p['id'] ?></td>
                <td><?= $p['nome'] ?></td>
                <td><?= $p['descricao'] ?></td>
                <td><?= $p['idade'] ?></td>
                <td><?= $p['tipo'] ?></td>
                <td><?= $p['ong'] ?></td>
                <td>
                    <a href="editar_produto.php?id=<?= $p['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="excluir_produto.php?id=<?= $p['id'] ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
