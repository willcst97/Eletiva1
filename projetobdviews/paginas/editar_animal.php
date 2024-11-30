<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/animais.php';
    require_once '../funcoes/tipos.php';
    require_once '../funcoes/ongs.php';

    $id = $_GET['id'];
    if (!$id) {
        header('Location: animais.php');
        exit();
    }

    $animal = buscarAnimalPorId($id);
    if (!$animal) {
        header('Location: animais.php');
        exit();
    }

    $tipos = buscarTipos();
    $ongs = buscarOngs();
    $erro = "";
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        try {
            $nome = $_POST['nome'];
            $descricao = $_POST['descricao'];
            $idade = intval($_POST['idade']);
            $tipo_id = intval($_POST['tipo_id']);
            $ong_id = intval($_POST['ong_id']);
            $id = intval($_POST['id']);
            if (empty($nome)) {
                $erro = "Preencha os campos obrigatórios!";
            } else {
                if (alterarAnimal($id, $nome, $descricao, $idade, $tipo_id, $ong_id)) {
                    header('Location: animais.php');
                    exit();
                } else {
                    $erro = "Erro ao alterar o animal!";
                }
            }
        } catch (Exception $e) {
            $erro = "Erro: " . $e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Editar Animal</h2> 
    <?php if (!empty($erro)): ?> 
        <p class="text-danger"><?= $erro ?></p> 
    <?php endif; ?> 
        <form method="post"> 
            <input type="hidden" name="id" value="<?= $id ?>" />
        <div class="mb-3">
            <label for="nome" class="form-label">Nome</label> 
            <input type="text" name="nome" value="<?= $animal['nome'] ?>" id="nome" class="form-control" required> 
        </div>
        <div class="mb-3"> 
            <label for="descricao" class="form-label">Descrição</label> 
            <textarea name="descricao" id="descricao" class="form-control" required><?= $animal['descricao'] ?></textarea> 
        </div>
        <div class="mb-3"> 
            <label for="idade" class="form-label">Idade</label> 
            <input type="number" name="idade" value="<?= $animal['idade'] ?>" id="idade" class="form-control" required> 
        </div>
        <div class="mb-3"> 
            <label for="tipo_id" class="form-label">Tipo</label> 
            <select name="tipo_id" id="tipo_id" class="form-control" required> 
                <?php foreach ($tipos as $c): ?> 
                    <option value="<?= $c['id'] ?>" <?= $c['id'] == $animal['tipo_id'] ? 'selected' : '' ?>> 
                        <?= $c['descricao'] ?> 
                    </option> 
                <?php endforeach; ?> 
            </select> 
        </div>
        <div class="mb-3"> <label for="ong_id" class="form-label">ONG Responsável</label>
            <select name="ong_id" id="ong_id" class="form-control" required>
                <?php foreach ($ongs as $o): ?>
                    <option value="<?= $o['id'] ?>"><?= $o['nome'] ?></option> 
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Animal</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>