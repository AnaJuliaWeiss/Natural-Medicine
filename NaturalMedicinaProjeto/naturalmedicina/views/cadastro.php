<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Planta</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0fff0;
            padding: 30px;
        }
        form {
            background-color: #ffffff;
            padding: 25px;
            border-radius: 8px;
            max-width: 600px;
            margin: auto;
        }
        input, textarea {
            width: 100%;
            padding: 8px;
            margin-top: 8px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }
        label {
            font-weight: bold;
        }
        button {
            background-color: #4CAF50;
            color: white;
            padding: 12px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        a {
            text-decoration: none;
            display: inline-block;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <h2>Cadastro de Nova Planta Medicinal</h2>
    <form action="../processos/processaCadastro.php" method="POST">
        <label>Nome Popular:</label>
        <input type="text" name="nome_popular" required>

        <label>Nome Científico:</label>
        <input type="text" name="nome_cientifico">

        <label>Uso Medicinal:</label>
        <textarea name="uso_medicinal" rows="3"></textarea>

        <label>Modo de Uso:</label>
        <textarea name="modo_uso" rows="2"></textarea>

        <label>Dosagem:</label>
        <input type="text" name="dosagem">

        <label>Efeitos Colaterais:</label>
        <textarea name="efeitos_colaterais" rows="2"></textarea>

        <label>Benefícios:</label>
        <textarea name="beneficios" rows="2"></textarea>

        <label>Malefícios:</label>
        <textarea name="maleficios" rows="2"></textarea>

        <label>URL da Imagem:</label>
        <input type="text" name="imagem_url">

        <label>Fonte:</label>
        <input type="text" name="fonte">

        <button type="submit">Cadastrar</button>
        <a href="pesquisa.php">Voltar para Pesquisa</a>
    </form>
</body>
</html>
