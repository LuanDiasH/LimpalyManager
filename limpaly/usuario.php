<?php
session_start();
require_once 'conexao.php';

// Criar uma instância da conexão e conectar ao banco de dados
$conexao = new Conexao();
$conn = $conexao->conectar();

// Função para cadastrar um novo usuário
function cadastrarUsuario($conn, $nome, $email, $senha) {
    $hashedPassword = password_hash($senha, PASSWORD_DEFAULT);

    $sql = "INSERT INTO tb_users (nome, email, senha) VALUES (:nome, :email, :senha)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome', $nome);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':senha', $hashedPassword);

    if ($stmt->execute()) {
        return true;
    } else {
        return false;
    }
}

// Função para validar o login do usuário
function validarLogin($conn, $email, $senha) {
    $sql = "SELECT * FROM tb_users WHERE email = :email";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':email', $email);
    $stmt->execute();

    if ($stmt->rowCount() > 0) {
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (password_verify($senha, $user['senha'])) {
            $_SESSION['user_id'] = $user['id'];
            return true;
        } else {
            return false;
        }
    } else {
        return false;
    }
}

// Manipulação das requisições POST para cadastro e login
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == 'cadastrar') {
            $nome = $_POST['nome'];
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            if (cadastrarUsuario($conn, $nome, $email, $senha)) {
                header('location: login.php');
            } else {
                echo "Erro ao cadastrar usuário.";
            }
        } elseif ($_POST['action'] == 'login') {
            $email = $_POST['email'];
            $senha = $_POST['senha'];
            if (validarLogin($conn, $email, $senha)) {
                header('location: dashboard.php');
            } else {
                echo "Usuário ou senha inválidos.";
            }
        }
    }
}
?>
