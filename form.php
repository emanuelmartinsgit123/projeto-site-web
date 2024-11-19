<?php

$name = $email = $message = '';
$nameErr = $emailErr = $messageErr = '';


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    if (empty($_POST["name"])) {
        $nameErr = "O nome é obrigatório.";
    } else {
        $name = test_input($_POST["name"]);
    }

    
    if (empty($_POST["email"])) {
        $emailErr = "O e-mail é obrigatório.";
    } else {
        $email = test_input($_POST["email"]);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $emailErr = "Formato de e-mail inválido.";
        }
    }

    
    if (empty($_POST["message"])) {
        $messageErr = "A mensagem é obrigatória.";
    } else {
        $message = test_input($_POST["message"]);
    }
}


function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultado do Formulário</title>
    <link rel="stylesheet" href="estilo.css">
</head>
<body>
    <header>
        <h1>Resultado do Formulário</h1>
    </header>

    <main>
        <?php
        
        if ($_SERVER["REQUEST_METHOD"] == "POST" && empty($nameErr) && empty($emailErr) && empty($messageErr)) {
            echo "<h2>Formulário enviado com sucesso!</h2>";
            echo "<p><strong>Nome:</strong> $name</p>";
            echo "<p><strong>E-mail:</strong> $email</p>";
            echo "<p><strong>Mensagem:</strong> $message</p>";
        } else {
            
            echo "<h2>Erro ao enviar o formulário</h2>";
            echo "<p class='error'>$nameErr</p>";
            echo "<p class='error'>$emailErr</p>";
            echo "<p class='error'>$messageErr</p>";
            echo "<p><a href='form.html'>Voltar para o formulário</a></p>";
        }
        ?>
    </main>

    <footer>
        <p>&copy; 2024 Meu Site. Todos os direitos reservados.</p>
    </footer>
</body>
</html>
