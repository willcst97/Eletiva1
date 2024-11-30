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
        try {
            $id = intval($_POST['id']);
            if (empty($id)){
                header('Location: ongs.php');
                exit();
            } else{
                if (excluirOng($id)){
                    header('Location: ongs.php');
                    exit();
                } else {
                    $erro = "Erro ao excluir a ONG!"; 
                }
            }
        } catch (Exception $e) {
            $erro = "Erro: ".$e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Excluir ONG</h2>
    
    <p>Tem certeza de que deseja excluir a ONG abaixo?</p>
    <ul>
        <li><strong>Nome:</strong> <?= $ong['nome'] ?></li>
        <li><strong>Endereço:</strong> <?= $ong['endereco'] ?></li>
        <li><strong>Telefone:</strong> <?= $ong['fone'] ?></li>
    </ul>
    <form method="post">
        <input type="hidden" name="id" value="<?= $id ?>" >
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="ongs.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
