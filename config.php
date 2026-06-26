<?php
session_start();
include 'credenciais.php';

if (!isset($_SESSION['autenticado']) || $_SESSION['autenticado'] !== true) {

    echo 'Erro! Você não está logado';
    }
if ($_SESSION['tipo'] === 'admin'){
    echo 'Configurações do administrador';
    
    }
    elseif ($_SESSION['tipo'] === 'root'){
    echo 'Configurações do root';

    }
    elseif ($_SESSION['tipo'] === 'user'){
    echo 'Configurações do usuário';

    }
    include $_SESSION['tipo'] . 'config.html'; 

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Configurações</title>
</head>
<body>
    
</body>
</html>