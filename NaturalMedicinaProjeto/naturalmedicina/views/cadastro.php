<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Planta</title>
    <style>
        * {
            box-sizing: border-box;
        }
        body {
            font-family: 'Segoe UI', sans-serif;
            background: #f2fef2;
            margin: 0;
            padding: 30px;
        }
        h2 {
            color: #2e7d32;
            text-align: center;
        }
        form {
            background: #ffffff;
            padding: 30px;
            border-radius: 15px;
            max-width: 700px;
            margin: 30px auto;
            box-shadow: 0 5px 20px rgba(0,0,0,0.1);
        }
        input[type="text"],
        input[type="file"],
        textarea {
            width: 100%;
            padding: 10px;
            margin: 8px 0 15px;
            border: 1px solid #ccc;
            border-radius: 8px;
        }
        button {
            background-color: #2e7d32;
            color: white;
            padding: 12px 25px;
            border: none;
            border-radius: 8px;
            font-size: 16px;
            cursor: pointer;
            transition: 0.3s;
        }
        button:hover {
            background-color: #256927;
        }
        label {
            font-weight: bold;
            color: #333;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #2e7d32;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <h2>Cadastro de Planta Medicinal</h2>
    <form action="../processos/processaCadastro.php" method="post" enctype="multipart/form-data">

        <label>Nome Popular</label>
        <input type="text" name="nome_popular" required>

        <label>Nome Científico</label>
        <input type="text" name="nome_cientifico" required>

        <label>Uso Medicinal</label>
        <textarea name="uso_medicinal" rows="3" required></textarea>

        <label>Modo de Uso</label>
        <textarea name="modo_uso" rows="3" required></textarea>

        <label>Dosagem</label>
        <input type="text" name="dosagem">

        <label>Efeitos Colaterais</label>
        <textarea name="efeitos_colaterais" rows="3"></textarea>

        <label>Benefícios</label>
        <textarea name="beneficios" rows="2"></textarea>

        <label>Malefícios</label>
        <textarea name="maleficios" rows="2"></textarea>

        <label>Escolher Imagem</label>
        <input type="file" name="imagem" accept="image/*" required>

        <label>Fonte</label>
        <input type="text" name="fonte">


       
        <button type="submit">Cadastrar</button>
    </form>
    <a href="pesquisa.php">← Voltar para a pesquisa</a>
</body>
</html>
