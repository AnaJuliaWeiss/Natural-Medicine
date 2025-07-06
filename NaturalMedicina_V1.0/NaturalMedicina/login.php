<!DOCTYPE html>
<html lang="pt-BR">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login</title>
    <link rel="stylesheet" href="css/login.css" />
    <link
      rel="shortcut icon"
      href="assets/favicon/logo.png"
      type="image/x-icon"
    />
  </head>
  <body>
    <div class="login-container">
      <h2>Entrar na sua conta</h2>

      <form action="./Usuarios/login.processa.php" method="POST" class="login-form">
  <div class="input-group">
    <label for="email">E-mail</label>
    <input type="email" id="email" name="email" required placeholder="Digite seu e-mail" />
  </div>

  <div class="input-group">
    <label for="password">Senha</label>
    <input type="password" id="password" name="password" required placeholder="Digite sua senha" />
  </div>

  <button type="submit" class="login-btn">Entrar</button>
</form>

      <div class="register-link">
        <p>Ainda não tem uma conta? <a href="cadastro.html">Cadastre-se</a></p>
      </div>
    </div>
  </body>
</html>
