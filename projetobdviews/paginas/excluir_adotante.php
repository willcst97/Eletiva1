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
        try {
            $id = intval($_POST['id']);
            if (empty($id)){
                header('Location: adotantes.php');
                exit();
            } else{
                if (excluirAdotante($id)){
                    header('Location: adotantes.php');
                    exit();
                } else {
                    $erro = "Erro ao excluir o adotante!"; 
                }
            }
        } catch (Exception $e) {
            $erro = "Erro: ".$e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Excluir Adotante</h2>
    
    <p>Tem certeza de que deseja excluir o adotante abaixo?</p>
    <ul>
        <li><strong>Nome:</strong> <?= $adotante['nome'] ?></li>
        <li><strong>Endereço:</strong> <?= $adotante['endereco'] ?></li>
        <li><strong>Idade:</strong> <?= $adotante['idade'] ?></li>
        <li><strong>Telefone:</strong> <?= $adotante['fone'] ?></li>
    </ul>
    <form method="post">
        <input type="hidden" name="id" value="<?= $id ?>" >
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="adotantes.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
