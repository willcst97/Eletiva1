<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php';
    require_once '../funcoes/animais.php';
    require_once '../funcoes/tipos.php';

    $id = $_GET['id'];
    if (!$id){
        header('Location: animais.php');
        exit();
    }

    $produto = buscarAnimalPorId($id);
    if (!$produto){
        header('Location: animais.php');
        exit();
    }

    $categorias = buscarTipos();

    $erro = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $id = intval($_POST['id']);
            if (empty($id)){
                header('Location: animais.php');
                exit();
            } else{
                if (excluirProduto($id)){
                    header('Location: animais.php');
                    exit();
                } else {
                    $erro = "Erro ao excluir o produto!"; 
                }
            }
        } catch (Exception $e) {
            $erro = "Erro: ".$e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Excluir Produto</h2>
    
    <p>Tem certeza de que deseja excluir o produto abaixo?</p>
    <ul>
        <li><strong>Nome:</strong> <?= $produto['nome'] ?></li>
        <li><strong>Descrição:</strong> <?= $produto['descricao'] ?></li>
        <li><strong>Categoria:</strong> <?= $produto['nome_categoria'] ?></li>
        <li><strong>Preço:</strong> <?= $produto['preco'] ?></li>
        <li><strong>Estoque Mínimo:</strong> <?= $produto['estoque_minimo'] ?></li>
    </ul>
    <form method="post">
        <input type="hidden" name="id" value="<?= $id ?>" >
        <button type="submit" name="confirmar" class="btn btn-danger">Excluir</button>
        <a href="produtos.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
