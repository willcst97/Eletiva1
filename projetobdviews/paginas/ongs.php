<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';  
    require_once '../funcoes/animais.php';
    
    $produtos = buscarAnimais();
?>

<div class="container mt-5">
    <h2>Gerenciamento de ONGs</h2>
    <a href="nova_ong.php" class="btn btn-success mb-3">Cadastrar ONG</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Telefone</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach($ongs as $ong) : ?>
            <tr>
                <td><?= $ong['id'] ?></td>
                <td><?= $ong['nome'] ?></td>
                <td><?= $ong['endereco'] ?></td>
                <td><?= $ong['fone'] ?></td>
                <td><?= $ong['email'] ?></td>
                <td>
                    <a href="editar_ong.php?id=<?= $ong['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="excluir_ong.php?id=<?= $ong['id'] ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>


<?php require_once 'rodape.php'; ?>
