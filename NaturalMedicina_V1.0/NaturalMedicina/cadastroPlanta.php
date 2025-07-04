<?php
// cadastroPlanta.php (substituindo o HTML antigo)
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Planta</title>
    <style>
        body { font-family: Arial; background: #e6f9e6; padding: 20px; }
        form { max-width: 600px; margin: auto; background: white; padding: 20px; border-radius: 10px; box-shadow: 0 0 10px #ccc; }
        label { display: block; margin-top: 10px; font-weight: bold; }
        input[type=text], textarea, input[type=file] {
            width: 100%;
            padding: 8px;
            margin-top: 4px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        button {
            margin-top: 15px;
            background-color: #4caf50;
            color: white;
            padding: 10px 15px;
            border: none;
            border-radius: 6px;
            cursor: pointer;
        }
        button:hover { background-color: #45a049; }
    </style>
</head>
<body>

<h2>Cadastro de Nova Planta</h2>

<form action="../processos/processaCadastro.php" method="post" enctype="multipart/form-data">
    <label for="nome_popular">Nome Popular:</label>
    <input type="text" name="nome_popular" required>

    <label for="nome_cientifico">Nome Científico:</label>
    <input type="text" name="nome_cientifico" required>

    <label for="uso_medicinal">Uso Medicinal:</label>
    <textarea name="uso_medicinal" rows="3"></textarea>

    <label for="modo_uso">Modo de Uso:</label>
    <textarea name="modo_uso" rows="3"></textarea>

    <label for="dosagem">Dosagem:</label>
    <input type="text" name="dosagem">

    <label for="efeitos_colaterais">Efeitos Colaterais:</label>
    <textarea name="efeitos_colaterais" rows="3"></textarea>

    <label for="beneficios">Benefícios:</label>
    <textarea name="beneficios" rows="3"></textarea>

    <label for="maleficios">Malefícios:</label>
    <textarea name="maleficios" rows="3"></textarea>

    <label for="fonte">Fonte:</label>
    <input type="text" name="fonte">

    <label for="imagem">Imagem:</label>
    <input type="file" name="imagem" accept="image/*">

    <button type="submit">Cadastrar Planta</button>
</form>

</body>
</html>
