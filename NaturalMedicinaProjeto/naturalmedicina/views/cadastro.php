<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Cadastro de Planta</title>
    <style>
        body { font-family: Arial; background: #e5ffe5; margin: 30px; }
        h2 { color: #2e7d32; }
        form { background: #fff; padding: 20px; border-radius: 10px; max-width: 600px; margin: auto; box-shadow: 0 0 10px #ccc; }
        input, textarea { width: 100%; margin-bottom: 10px; padding: 8px; }
        button { background: #2e7d32; color: #fff; padding: 10px 20px; border: none; border-radius: 5px; }
        a { display: inline-block; margin-top: 15px; color: #2e7d32; }
    </style>
</head>
<body>
    <h2>Cadastro de Planta Medicinal</h2>
    <form action="../processos/processaCadastro.php" method="post" enctype="multipart/form-data">
        <input type="text" name="nome_popular" placeholder="Nome Popular" required>
        <input type="text" name="nome_cientifico" placeholder="Nome Científico" required>
        <textarea name="uso_medicinal" placeholder="Uso Medicinal" required></textarea>
        <textarea name="modo_uso" placeholder="Modo de Uso" required></textarea>
        <input type="text" name="dosagem" placeholder="Dosagem">
        <textarea name="efeitos_colaterais" placeholder="Efeitos Colaterais"></textarea>
        <textarea name="beneficios" placeholder="Benefícios"></textarea>
        <textarea name="maleficios" placeholder="Malefícios"></textarea>
        <input type="file" name="imagem" accept="image/*" required>
        <input type="text" name="fonte" placeholder="Fonte da Informação">
        <button type="submit">Cadastrar</button>
    </form>
    <a href="pesquisa.php">← Voltar para a pesquisa</a>
</body>
</html>
