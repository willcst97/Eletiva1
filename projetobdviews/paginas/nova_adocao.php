<?php 
    require_once 'cabecalho.php'; 
    require_once 'navbar.php'; 
    require_once '../funcoes/adotantes.php';
    require_once '../funcoes/animais.php';
    require_once '../funcoes/adocoes.php';

    $adotantes = buscarAdotantes();
    $animais = buscarAnimais();
    $dataAtual = date('Y-m-d'); // Data atual no formato AAAA-MM-DD

    $erro = '';

    if ($_SERVER['REQUEST_METHOD'] == 'POST'){
        try {
            $data = $_POST['data'];
            $adotante_id = intval($_POST['adotante_id']); // Convertendo para int
            $animal_id = intval($_POST['animal_id']); // Convertendo para int
            $aprovacao_ong = intval($_POST['aprovacao_ong']); // Convertendo para int
            $ressalva = $_POST['ressalva'];

            if (empty($data) || empty($adotante_id) || empty($animal_id)){
                $erro = "Informe os valores obrigatórios!";
            } else {
                if (criarAdocao($data, $adotante_id, $animal_id, $aprovacao_ong, $ressalva)){
                    header('Location: adocoes.php');
                    exit();
                } else {
                    $erro = "Erro ao registrar a adoção!";
                }
            }
        } catch (Exception $e){
            $erro = "Erro: ".$e->getMessage();
        }
    }
?>

<div class="container mt-5">
    <h2>Registrar Nova Adoção</h2>

    <?php if(!empty($erro)):?>
        <p class="text-danger"><?= $erro ?></p>
    <?php endif; ?>

    <form method="post">
        <div class="mb-3">
            <label for="data" class="form-label">Data</label>
            <input type="date" name="data" id="data" class="form-control" value="<?= $dataAtual ?>" required>
        </div>
        <div class="mb-3">
            <label for="adotante_id" class="form-label">Adotante</label>
            <select name="adotante_id" id="adotante_id" class="form-select" required>
                <?php foreach($adotantes as $adotante): ?>
                    <option value="<?= intval($adotante['id'])?>"><?= htmlspecialchars($adotante['nome']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="animal_id" class="form-label">Animal</label>
            <select name="animal_id" id="animal_id" class="form-select" required>
                <?php foreach($animais as $animal): ?>
                    <option value="<?= intval($animal['id'])?>"><?= htmlspecialchars($animal['nome']) ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="aprovacao_ong" class="form-label">Aprovação da ONG</label>
            <select name="aprovacao_ong" id="aprovacao_ong" class="form-select" required>
                <option value="1">Sim</option>
                <option value="2">Não</option>
            </select>
        </div>
        <div class="mb-3">
            <label for="ressalva" class="form-label">Ressalva</label>
            <textarea name="ressalva" id="ressalva" class="form-control"></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Registrar Adoção</button>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
