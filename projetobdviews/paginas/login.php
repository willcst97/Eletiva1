<?php require_once 'cabecalho.php'; ?>

<div class="container mt-5">
    <h2>Login</h2>
    <form method="post" action="dashboard.php">
        <div class="row shadow p-3 mb-5 bg-body-tertiary rounded">
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" class="form-control" id="senha" required>
            </div>
            <div>
                <button type="submit" class="btn btn-primary">Entrar</button>
                <button type="button" class="btn btn-outline-secondary">Criar conta</button>
            </div>
        </div>
    </form>
</div>

<?php require_once 'rodape.php'; ?>