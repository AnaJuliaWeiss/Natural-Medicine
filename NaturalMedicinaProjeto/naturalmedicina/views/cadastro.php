<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Planta</title>
    <style>
        form {
            max-width: 600px;
            margin: 30px auto;
            font-family: Arial, sans-serif;
        }
        div.form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 6px;
            font-weight: bold;
        }
        input[type="text"],
        textarea,
        input[type="file"] {
            width: 100%;
            padding: 8px;
            box-sizing: border-box;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        textarea {
            resize: vertical;
        }
        button {
            background-color: #2d89ef;
            color: white;
            border: none;
            padding: 10px 20px;
            border-radius: 5px;
            cursor: pointer;
        }
        button:hover {
            background-color: #1b5fbd;
        }
        a {
            display: block;
            text-align: center;
            margin-top: 20px;
            color: #2d89ef;
            text-decoration: none;
            font-weight: bold;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>

<h2 style="text-align:center;">Cadastro de Planta Medicinal</h2>

<form action="../controllers/processaCadastro.php" method="POST" enctype="multipart/form-data">
  
  <label>Nome Popular:</label>
  <input type="text" name="nome_popular" required>

  <label>Nome Científico:</label>
  <input type="text" name="nome_cientifico" required>

  <label>Uso Medicinal:</label>
  <textarea name="uso_medicinal"></textarea>

  <label>Modo de Uso:</label>
  <textarea name="modo_uso"></textarea>

  <label>Dosagem:</label>
  <textarea name="dosagem"></textarea>

  <label>Efeitos Colaterais:</label>
  <textarea name="efeitos_colaterais"></textarea>

  <label>Benefícios:</label>
  <textarea name="beneficios"></textarea>

  <label>Malefícios:</label>
  <textarea name="maleficios"></textarea>

  <label>Fonte:</label>
  <input type="text" name="fonte">

  <label>Imagem da Planta:</label>
  <input type="file" name="imagem" accept="image/*">

  <br><br>
  <button type="submit">Cadastrar</button>
</form>

<a href="../index.php">Voltar à Lista</a>

</body>
</html>
