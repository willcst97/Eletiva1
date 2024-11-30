<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/adocoes.php';
    require_once '../funcoes/adotantes.php';
    require_once '../funcoes/animais.php';

    $id = $_GET['id'];
    if (!$id){
        header('Location: adocoes.php');
        exit();
    }

    $adocao = buscarAdocaoPorId($id);
    if (!$adocao){
        header('Location: adocoes.php');
        exit();
    }

    $adotantes = buscarAdotantes();
    $animais = buscarAnimais();

    $erro = "";

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try{
            $adotante_id = intval($_POST['adotante_id']);
            $animal_id = intval($_POST['animal_id']);
            $data = $_POST['data'];
            $aprovacao_ong = intval($_POST['aprovacao_ong']);
            $ressalva = $_POST['ressalva'];
            $id = intval($_POST['id']);
            if (empty($adotante_id) || empty($animal_id) || empty($data)){
                $erro = "Preencha todos os campos obrigatórios!";
            } else {
                if (alterarAdocao($id, $adotante_id, $animal_id, $data, $aprovacao_ong, $ressalva)){
                    header('Location: adocoes.php');
                    exit();
                } else {
                    $erro = "Erro ao alterar a adoção!";
                }
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Editar Adoção</h2>

    <?php if(!empty($erro)):?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <form method="post">
        <input type="hidden" name="id" value="<?= $id ?>" />
        <div class="mb-3">
            <label for="adotante_id" class="form-label">Adotante</label>
            <select name="adotante_id" id="adotante_id" class="form-control" required>
                <?php foreach ($adotantes as $adotante): ?>
                    <option value="<?= $adotante['id'] ?>" 
                    <?= $adotante['id'] == $adocao['adotante_id'] ? 'selected': '' ?>>
                        <?= $adotante['nome'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="animal_id" class="form-label">Animal</label>
            <select name="animal_id" id="animal_id" class="form-control" required>
                <?php foreach ($animais as $animal): ?>
                    <option value="<?= $animal['id'] ?>" 
                    <?= $animal['id'] == $adocao['animal_id'] ? 'selected': '' ?>>
                        <?= $animal['nome'] ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" name="data" value="<?= $adocao['data'] ?>" id="data" class="form-control" required>
        </div>
        <div class="mb-3">
            <label for="aprovacao_ong" class="form-label">Aprovação da ONG</label>
            <select name="aprovacao_ong" id="aprovacao_ong" class="form-control" required>
                <option value="1" <?= $adocao['aprovacao_ong'] == 1 ? 'selected': '' ?>>Aprovado</option>
                <option value="2" <?= $adocao['aprovacao_ong'] == 2 ? 'selected': '' ?>>Reprovado</option>
                <option value="0" <?= $adocao['aprovacao_ong'] == 0 ? 'selected': '' ?>>Pendente</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="ressalva" class="form-label">Ressalva</label>
            <textarea name="ressalva" id="ressalva" class="form-control"><?= $adocao['ressalva'] ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Atualizar Adoção</button>
        <a href="adocoes.php" class="btn btn-secondary">Cancelar</a>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
