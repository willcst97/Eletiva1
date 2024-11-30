<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/animais.php';

    $id = $_GET['id'];
    if (!$id){
        header('Location: animais.php');
        exit();
    }

    $animal = buscarAnimalPorId($id);
    if (!$animal){
        header('Location: animais.php');
        exit();
    }

    $erro = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $id = intval($_POST['id']);
            if (empty($id)){
                header('Location: animais.php');
                exit();
            } else{
                if (excluirAnimal($id)){
                    header('Location: animais.php');
                    exit();
                } else {
                    $erro = "Erro ao excluir o animal!"; 
                }
            }
        } catch (Exception $e) {
            $erro = "Erro: ".$e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Excluir Animal</h2>
    
    <p>Tem certeza de que deseja excluir o animal abaixo?</p>
    <ul>
        <li><strong>Nome:</strong> <?= $animal['nome'] ?></li>
        <li><strong>Descrição:</strong> <?= $animal['descricao'] ?></li>
        <li><strong>Idade:</strong> <?= $animal['idade'] ?></li>
        <li><strong>Tipo:</strong> <?= $animal['tipo_descricao'] ?></li>
        <li><strong>ONG Responsável:</strong> <?= $animal['ong_nome'] ?></li>
    </ul>
    <form method="post">
        <input type="hidden" name="id" value="<?= $id ?>" >
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="animais.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
