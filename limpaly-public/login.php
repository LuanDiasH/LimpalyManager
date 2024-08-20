<?php
    require "usuario.php";
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Limpaly - Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Bitter:ital,wght@0,100..900;1,100..900&family=Concert+One&family=Ga+Maamli&family=Lora:ital,wght@1,500&display=swap');

        .bitter{
            font-family: "Bitter", serif;
            font-optical-sizing: auto;
            font-weight: <weight>;
            font-style: normal;
        }
        .concert-one-regular {
            font-family: "Concert One", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
        .bebas-neue-regular {
            font-family: "Bebas Neue", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
        .ga-maamli-regular {
            font-family: "Ga Maamli", sans-serif;
            font-weight: 400;
            font-style: normal;
        }
        body {
            background-color: #10002b; /* roxo escuro */
            overflow-x: none;
            background-image: url("img/background.png");
        }
        nav {
            background-color: #240046; /* roxo claro */
        }
        nav a {
            color: #ffffff !important; /* Branco */
        }
        nav a:hover{
            color: #7b2cbf !important; /* roxo claro */
        }
        .ativo{
            color: #7b2cbf !important; /* roxo claro */
        }
        #card-login {
            width: 500px;
            max-width: 100%;
            margin: 0 auto;
            margin-top: 100px;
            color: #ffffff; /* Branco */
            padding: 40px;
            box-shadow: 0 0 10px 0 rgba(0, 0, 0, 0.2);
            border-radius: 10px;
            background-color: #240046; /* roxo claro */
        }
        #card-login h1 {
            text-align: center;
            margin-top: 20px;
        }
        #card-login form {
            margin-top: 20px;
        }
        #card-login form input {
            margin-bottom: 10px;
        }
        #card-login form button {
            margin-top: 10px;
        }
        
        .botao{
            background-color: #7b2cbf !important; /* roxo claro */
            color: #ffffff !important; /* Branco */
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
        }
        .botao:hover{
            background-color: #ffff !important; /* branco */
            color: #7b2cbf !important; /* roxo claro */
            border: none;
            border-radius: 10px;
            padding: 10px 20px;
        }
        footer {
            background-color: #240046; /* roxo claro */
            color: #ffffff; /* Branco */
            padding: 10px 0;
            text-align: center;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-dark py-1">
        <div class="container-fluid">
            <a class="navbar-brand ga-maamli-regular" href="#"><img src="img/logob.png" class="me-2" width="75px" height="75px" alt=""> Limpaly</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav justify-content-end d-flex gap-2 mt-2 mt-lg-0 ms-auto ">
                    <a class="nav-link bebas-neue-regular" href="index.php">Home</a>
                    <a class="nav-link bebas-neue-regular ativo" href="login.php">Entrar</a>
                    <a class="nav-link bebas-neue-regular" href="cadastro.php">Cadastrar-se</a>
                </div>
            </div>
        </div>
    </nav>

            
            <div class="container text-white mt-1 align-items-center justify-content-center" id="tudo" >
                <div class="col-12 col-md-6 col-lg-4" id="card-login">
                    <div class="">
                        <img src="img/login.png" class="img-fluid" alt="">
                    </div>
                    <h1 class="text-center">Login</h1>
                    <form method="POST" action="usuario.php" class="formLogin">
                        <input type="hidden" name="action" value="login">
                        <div class="mb-3">
                            <label for="email" class="form-label">Email:</label>
                            <input type="email" class="form-control"  id="email" name="email" placeholder="Digite seu e-mail" required />
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password:</label>
                            <input type="password" class="form-control"  id="password" name="senha" placeholder="Digite sua senha" required />
                        </div>
                        <button type="submit" value="Cadastrar" class="botao w-100 mb-2">Submit</button>
                        <p>Não tem uma conta? <a href="cadastro.php">Faça cadastro.</a></p>
                    </form>
                </div>
            </div>

            <footer class="text-white text-center py-1 mt-5">
                <p>&copy; 2024 Limpaly. Todos os direitos reservados.</p>
            </footer>


    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    
</body>
</html>