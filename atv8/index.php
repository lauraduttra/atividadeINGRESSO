<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desafio Final</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="background">
        <div class="form-container">
            <h2>Formulário de Ingresso</h2>
            <form method="post"> <!-- Adicionado method="post" -->
                <label for="nome">Nome:</label>
                <input type="text" id="nome" name="nome" required>

                <label for="idade">Idade:</label>
                <input type="number" id="idade" name="idade" required>

                <label for="tipo-ingresso">Tipo de Ingresso:</label>
                <select id="tipo-ingresso" name="tipo-ingresso" required>
                    <option value="VIP">VIP</option>
                    <option value="Regular">REGULAR</option>
                    <option value="Basico">BÁSICO</option>
                </select>
                <br><br>
                <button type="submit">Enviar</button>
            </form>

            <?php
                if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                    $nome = $_POST['nome'];
                    $ingresso = $_POST['tipo-ingresso']; // Corrigido para 'tipo-ingresso'
                    $idade = $_POST['idade'];

                    echo "<p>Bem-vindo(a), $nome!</p>";

                    if ($idade < 18) {
                        echo "<p>Ingresso não permitido para menores de idade.</p>";
                    } else {
                        switch ($ingresso) {
                            case "VIP":
                                $preco = 800.00;
                                break;

                            case "Regular":
                                $preco = 500.00;
                                break;

                            case "Basico":
                                $preco = 300.00;
                                break;

                            default:
                                echo "Opção inválida";
                                exit;
                        }
                        echo "Preço: " . number_format($preco, 2, ',', '.');
                    }
                }
            ?>
        </div>
    </div>
</body>
</html>
