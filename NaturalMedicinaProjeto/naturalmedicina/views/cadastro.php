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
    </style>


<h2 style="text-align:center;">Cadastro de Planta Medicinal</h2>

<?php require_once '../config/database.php'; ?>

<h2>Cadastro de Nova Planta</h2>
<form action="../controllers/processaCadastro.php" method="POST" enctype="multipart/form-data">
  <label>Nome Popular:</label>
  <input type="text" name="nome_popular" required><br>

  <label>Nome Científico:</label>
  <input type="text" name="nome_cientifico" required><br>

  <label>Uso Medicinal:</label>
  <textarea name="uso_medicinal"></textarea><br>

  <label>Modo de Uso:</label>
  <textarea name="modo_uso"></textarea><br>

  <label>Dosagem:</label>
  <textarea name="dosagem"></textarea><br>

  <label>Efeitos Colaterais:</label>
  <textarea name="efeitos_colaterais"></textarea><br>

  <label>Benefícios:</label>
  <textarea name="beneficios"></textarea><br>

  <label>Malefícios:</label>
  <textarea name="maleficios"></textarea><br>

  <label>Fonte:</label>
  <input type="text" name="fonte"><br>

  <label>Imagem da Planta:</label>
  <input type="file" name="imagem"><br><br>

  <button type="submit">Cadastrar</button>
</form>
<a href="lista.php">Voltar à Lista</a>
</head>
<body>
