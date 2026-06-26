<?php
session_start();
require_once 'credenciais.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $usuario = $_POST['usuario'] ?? '';
    $senha = $_POST['senha'] ?? '';

    if (
        $usuario === $credenciais['admin']['usuario'] &&
        $senha === $credenciais['admin']['senha']
    ) {
        $_SESSION['autenticado'] = true;
        $_SESSION['tipo'] = 'admin';
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
        exit();
    } elseif (
        $usuario === $credenciais['root']['usuario'] &&
        $senha === $credenciais['root']['senha']
    ) {
        $_SESSION['autenticado'] = true;
        $_SESSION['tipo'] = 'root';
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
        exit();
    } elseif (
        $usuario === $credenciais['moderador']['usuario'] &&
        $senha === $credenciais['moderador']['senha']
    ) {
        $_SESSION['autenticado'] = true;
        $_SESSION['tipo'] = 'moderador';
        $_SESSION['usuario'] = $usuario;
        header('Location: index.php');
        exit();
    } else {
        $erro = 'Credenciais inválidas.';
    }
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="guest">

    <div id="header">
        <h1>Sistema de Acesso</h1>
        <form method="POST">
            <input type="text"     name="usuario" placeholder="Usuário" required>
            <input type="password" name="senha"   placeholder="Senha"   required>
            <button type="submit">Entrar</button>
            <?php if (!empty($erro)): ?>
                <span class="erro"><?php echo htmlspecialchars($erro); ?></span>
            <?php endif; ?>
        </form>
    </div>

    <div id="content">
        <h2>Bem-vindo</h2>
        <p>Utilize o menu superior para fazer login.</p>
    </div>

</body>
</html>
