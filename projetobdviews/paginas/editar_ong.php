<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/ongs.php';

    $id = $_GET['id'];
    if (!$id){
        header('Location: ongs.php');
        exit();
    }

    $ong = buscarOngPorId($id);
    if (!$ong){
        header('Location: ongs.php');
        exit();
    }

    $erro = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try{
            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];
            $fone = $_POST['fone'];
            $id = intval($_POST['id']);
            if (empty($nome) || empty($endereco) || empty($fone)){
                $erro = "Preencha todos os campos obrigatórios!";
            } else {
                if (alterarOng($id, $nome, $endereco, $fone)){
                    header('Location: ongs.php');
                    exit();
                } else {
                    $erro = "Erro ao alterar a ONG!";
                }
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Editar ONG</h2>

    <?php if(!empty($erro)):?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="hidden" name="id" value="<?= $id ?>" />
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" value="<?= $ong['nome'] ?>" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <textarea name="endereco" id="endereco" class="form-control" required><?= $ong['endereco'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="fone" class="form-label">Telefone</label>
            <input type="text" name="fone" value="<?= $ong['fone'] ?>" id="fone" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar ONG</button>
        <a href="ongs.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
