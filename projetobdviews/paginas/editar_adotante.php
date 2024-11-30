<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/adotantes.php';

    $id = $_GET['id'];
    if (!$id){
        header('Location: adotantes.php');
        exit();
    }

    $adotante = buscarAdotantePorId($id);
    if (!$adotante){
        header('Location: adotantes.php');
        exit();
    }

    $erro = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try{
            $nome = $_POST['nome'];
            $endereco = $_POST['endereco'];
            $idade = intval($_POST['idade']);
            $fone = $_POST['fone'];
            $id = intval($_POST['id']);
            if (empty($nome) || empty($endereco) || empty($fone)){
                $erro = "Preencha todos os campos obrigatórios!";
            } else {
                if (alterarAdotante($id, $nome, $endereco, $idade, $fone)){
                    header('Location: adotantes.php');
                    exit();
                } else {
                    $erro = "Erro ao alterar o adotante!";
                }
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Editar Adotante</h2>

    <?php if(!empty($erro)):?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="hidden" name="id" value="<?= $id ?>" />
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label>
            <input type="text" name="nome" value="<?= $adotante['nome'] ?>" id="nome" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="endereco" class="form-label">Endereço</label>
            <textarea name="endereco" id="endereco" class="form-control" required><?= $adotante['endereco'] ?></textarea>
        </div>
        <div class="mb-3">
            <label for="idade" class="form-label">Idade</label>
            <input type="number" name="idade" value="<?= $adotante['idade'] ?>" id="idade" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="fone" class="form-label">Telefone</label>
            <input type="text" name="fone" value="<?= $adotante['fone'] ?>" id="fone" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Adotante</button>
        <a href="adotantes.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
