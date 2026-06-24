<?php
session_start();

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {
    header('Location: login.php');
    exit();
}

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Painel — <?php echo htmlspecialchars($_SESSION['tipo']); ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body class="<?php echo htmlspecialchars($_SESSION['tipo']); ?>">

    <div id="header">
        <h1>Olá, <?php echo ($_SESSION['usuario'] ?? ''); ?></h1>
        <nav>
            <a href="#">Configurações</a>
            <a href="logout.php">Sair</a>
        </nav>
    </div>

    <div id="wrapper">
        <?php include $_SESSION['tipo'] . '.html'; ?>
    </div>

</body>
</html>
