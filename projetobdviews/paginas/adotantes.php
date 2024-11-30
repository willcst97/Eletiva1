<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';  
    require_once '../funcoes/adotantes.php';
    
    $adotantes = buscarAdotantes();
?>

<div class="container mt-5">
    <h2>Gerenciamento de Adotantes</h2>
    <a href="novo_adotante.php" class="btn btn-success mb-3">Cadastrar Adotante</a>
    <table class="table table-hover table-striped">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>Endereço</th>
                <th>Idade</th>
                <th>Telefone</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            
            <?php foreach($adotantes as $a) : ?>
            <tr>
                <td><?= $a['id'] ?></td>
                <td><?= $a['nome'] ?></td>
                <td><?= $a['endereco'] ?></td>
                <td><?= $a['idade'] ?></td>
                <td><?= $a['fone'] ?></td>
                <td>
                    <a href="editar_adotante.php?id=<?= $a['id'] ?>" class="btn btn-warning">Editar</a>
                    <a href="excluir_adotante.php?id=<?= $a['id'] ?>" class="btn btn-danger">Excluir</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</div>

<?php require_once 'rodape.php'; ?>
