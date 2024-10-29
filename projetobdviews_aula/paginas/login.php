<?php 

    require_once('../funcoes/usuarios.php');

    session_start();
    if($_SERVER['REQUEST_METHOD'] == "POST"){
        try{
            $email = $_POST['email'] ?? "";
            $senha = $_POST['senha'] ?? "";
            if ($email != "" && $senha != ""){
                $usuario = login($email, $senha);
                if ($usuario){
                    $_SESSION['usuario'] = $usuario['nome'];
                    $_SESSION['nivel'] = $usuario['nivel'];
                    $_SESSION['acesso'] = true;
                    header("Location: dashboard.php");
                } else {
                    $erro = "Credenciais inválidas!";
                }
            }
        } catch(Exception $e){
            echo "Erro: ".$e->getMessage();
        }
    }
    require_once 'cabecalho.php'; 
?>

<div class="container mt-5">
    <form method="post" action="dashboard.php">
        <div class="row shadow p-3 mb-5 bg-body-tertiary rounded position-relative mx-auto custom-max-width">
            <h2>Login</h2>
            <div class="mb-3">
                <label for="email" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" id="email" required>
            </div>
            <div class="mb-3">
                <label for="senha" class="form-label">Senha</label>
                <input type="password" name="senha" class="form-control" id="senha" required>
            </div>
            <div class="mb-3 d-grid gap-2 col-6 mx-auto">
                <button type="submit" class="btn btn-primary">Entrar</button>
                <a href='novo_usuario.php' class="btn btn-outline-secondary">Criar conta</a>
            </div>
        </div>
    </form>
</div>

<?php require_once 'rodape.php'; ?>
