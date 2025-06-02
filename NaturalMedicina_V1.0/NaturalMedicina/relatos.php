<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Relato</title>
    <link rel="stylesheet" href="css/relatos.css" />
    <link
      rel="shortcut icon"
      href="assets/favicon/logo.png"
      type="image/x-icon"
    />
    <link
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css"
      rel="stylesheet"
    />
  </head>
  <body>
    <header class="header">
      <div class="logo"><img src="assets/favicon/logo.png" alt="" /></div>
      <nav class="menu">
        <a href="index.html">Menu</a>
        <a href="cadastroPlanta.html">Cadastrar Planta</a>
        <form class="search-form">
          <input id="search-input" type="text" placeholder="Buscar..." />
          <button type="submit"><i class="fas fa-search"></i></button>
        </form>
      </nav>
    </header>

    <h1>Cadastro de Relatos</h1>
    <form action="relatos.php" method="post">
        <fieldset>
            <legend>Formulário</legend>

            <label for="id_relato">Id:</label>
            <input type="text" name="id_relato" readonly value="">

            <label for="titulo">Título:</label>
            <input type="text" name="titulo" value="">

            <label for="data_relato">Data do Relato:</label>
            <input type="date" name="data_relato" value="">
            <br>

            <label for="descricao">Seu relato:</label>
            <textarea name="descricao" rows="5" cols="30"></textarea><br>

            <label for="id_usuario">Usuário:</label>
            <input type="text"  name="id_usuario" readonly value="">
            <br>
            <label for="id_planta">Planta:</label>
            <input type="text"  name="id_planta" readonly value="">

            <br><br>
            <button type="submit" name="acao" value="salvar">Salvar</button>
            <button type="submit" name="acao" value="excluir">Excluir</button>
            <input type="reset" value="Cancelar">
        </fieldset>
    </form>
     
  </body>
</html>
