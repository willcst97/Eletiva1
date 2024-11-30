<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/ongs.php';

    $erro = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];
            $fone = $_POST['fone'];
            if (empty($nome) || empty($endereco) || empty($fone)){
                $erro = "Informe os valores obrigatórios!";
            } else {
                if (criarOng($nome, $endereco, $fone)){
                    header('Location: ongs.php');
                    exit();
                } else {
                    $erro = "Erro ao inserir a ONG!";
                }
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Criar Nova ONG</h2>

    <?php if(!empty($erro)):?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <textarea name="endereco" id="endereco" class="form-control" required></textarea>
        </div>
        <div class="mb-3">
            <label for="fone" class="form-label">Telefone</label>
            <input type="text" name="fone" id="fone" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Criar ONG</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
