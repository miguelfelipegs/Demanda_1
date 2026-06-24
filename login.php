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
