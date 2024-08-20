<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Finance Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

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
        .card{
            width: 20rem;
            padding: 10px; 
            border-radius: 40px;
            background-color: #10002b; /* roxo escuro */
            color: #ffffff; /* Branco */
            border: none;
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
                    <a class="nav-link bebas-neue-regular ativo" href="index.php">Home</a>
                    <a class="nav-link bebas-neue-regular" href="login.php">Entrar</a>
                    <a class="nav-link bebas-neue-regular" href="cadastro.php">Cadastrar-se</a>
                </div>
            </div>
        </div>
    </nav>

    <div class="container text-white mt-3" id="tudo" >
        <div class="row ms-md-5 align-items-center">
            <div class="col-md-6 col-12">
                <h1><a class="navbar-brand concert-one-regular" href="#">Gestão de Limpeza</a></h1>
                <p class="bitter mt-4">Ferramentas e soluções práticas para ajudar você a controlar seu hotel de maneira eficiente.
                    Junte-se a nós e descubra como é fácil tomar o controle de higienico e garantir um ambiente mais limpo e bonito.
                </p>
                <button class="botao mt-2 me-2"><a class="nav-link" href="login.php">Entrar</a></button>
                <button class="botao mt-2"><a class="nav-link" href="cadastro.php">Cadastrar-se</a></button>
            </div>
            <div class="col-md-6 col-12 order-first order-md-last">
                <img src="img/home.png" alt="" class="img-fluid">
            </div>
        </div>

        <hr>

        <div class="row ms-md-5 align-items-center mt-4">
            <div class="col-md-4 col-12 mt-3">
                <div class="card ms-auto me-auto ">
                    <img class="card-img-top" src="img/agilidade.png" alt="Imagem de capa do card">
                    <div class="card-body">
                        <h5 class="card-title concert-one-regular">Organização</h5>
                        <p class="card-text">Tenha a capacidade de organização rapida e eficiente sobre a higiene do seus quartos. </p>
                    </div>
                </div>
            </div>
            
            <div class="col-md-4 col-12 mt-3">
                <div class="card ms-auto me-auto">
                    <img class="card-img-top" src="img/agencia.png" alt="Imagem de capa do card">
                    <div class="card-body">
                        <h5 class="card-title concert-one-regular">Para Agencias</h5>
                        <p class="card-text">Transforme a gestão higiênica da sua agência com nossas ferramentas especializadas e eficientes.</p>
                    </div>
                </div>
            </div>

            <div class="col-md-4 col-12 mt-3">
                <div class="card ms-auto me-auto">
                    <img class="card-img-top" src="img/empresa.png" alt="Imagem de capa do card">
                    <div class="card-body">
                        <h5 class="card-title concert-one-regular">Para Empresas</h5>
                        <p class="card-text">Otimize a gestão higiênica da sua empresa com nossas soluções avançadas e personalizáveis.</p>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <footer class="text-white text-center py-1 mt-5">
        <p>&copy; 2024 Limpaly. Todos os direitos reservados.</p>
    </footer>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>