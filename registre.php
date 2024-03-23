<?php
// Conexão com o banco de dados (substitua com suas credenciais)
$servername = "localhost";
$username = "seu_usuario";
$password = "sua_senha";
$dbname = "seu_banco_de_dados";

// Cria a conexão
$conn = new mysqli($servername, $username, $password, $dbname);

// Verifica a conexão
if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}

// Processa os dados do formulário
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  $username = $_POST['username'];
  $password = password_hash($_POST['password'], PASSWORD_DEFAULT); // Hash da senha

  // Insere o usuário no banco de dados
  $sql = "INSERT INTO users (username, password) VALUES ('$username', '$password')";

  if ($conn->query($sql) === TRUE) {
    echo "Usuário registrado com sucesso!";
  } else {
    echo "Erro ao registrar o usuário: " . $conn->error;
  }
}

// Fecha a conexão
$conn->close();
?>