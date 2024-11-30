<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/adocoes.php';

    $id = $_GET['id'] ?? null;
    if (!$id){
        header('Location: adocoes.php');
        exit();
    }

    $adocao = buscarAdocaoPorId($id);
    if (!$adocao){
        header('Location: adocoes.php');
        exit();
    }

    $erro = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $id = intval($_POST['id']);
            if (empty($id)){
                header('Location: adocoes.php');
                exit();
            } else{
                if (excluirAdocao($id)){
                    header('Location: adocoes.php');
                    exit();
                } else {
                    $erro = "Erro ao excluir a adoção!"; 
                }
            }
        } catch (Exception $e) {
            $erro = "Erro: " . $e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Excluir Adoção</h2>
    
    <p>Tem certeza de que deseja excluir a adoção abaixo?</p>
    <ul>
        <li><strong>Data:</strong> <?= (new DateTime($adocao['data']))->format('d/m/Y') ?></li>
        <li><strong>Adotante:</strong> <?= $adocao['adotante_nome'] ?></li>
        <li><strong>Animal:</strong> <?= $adocao['animal_nome'] ?></li>
        <li><strong>Aprovação da ONG:</strong> <?= $adocao['aprovacao_ong'] == 1 ? 'Aprovado!' : ($adocao['aprovacao_ong'] == 2 ? 'Reprovado!' : 'Pendente') ?></li>
        <li><strong>Ressalva:</strong> <?= !empty($adocao['ressalva']) ? htmlspecialchars($adocao['ressalva']) : 'N/A' ?></li>
    </ul>
    <form method="post">
        <input type="hidden" name="id" value="<?= $id ?>">
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="adocoes.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
