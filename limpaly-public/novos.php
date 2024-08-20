<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Limpaly - Gerir quartos</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://kit.fontawesome.com/bb9b182887.js" crossorigin="anonymous"></script>
    <script>
        function editar(id_quarto, numero_quarto) {
            let form = document.createElement('form');
            form.action = 'quarto_controller.php?acao=atualizar';
            form.method = 'post';
            form.className = 'row';

            let inputQuarto = document.createElement('input');
            inputQuarto.type = 'text';
            inputQuarto.name = 'numero_quarto';
            inputQuarto.className = 'col-9 form-control';
            inputQuarto.value = numero_quarto;

            let inputId = document.createElement('input');
            inputId.type = 'hidden';
            inputId.name = 'id_quarto';
            inputId.value = id_quarto;

            form.appendChild(inputQuarto);
            form.appendChild(inputId);

            let numeroQuartoCell = document.getElementById('numero_quarto_' + id_quarto);
            numeroQuartoCell.innerHTML = '';
            numeroQuartoCell.appendChild(form);

        }

        function remover(id_quarto) {
            location.href = 'todos.php?acao=remover&id_quarto=' + id_quarto;
        }

        function marcarRealizada(id_quarto, id_status) {
            location.href = 'todos.php?acao=marcarRealizada&id_quarto=' + id_quarto + '&id_status=' + id_status;
        }
    </script>
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
            color: #fff;
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
        #breadcrumb{
            padding: 10px, 5px, 10px, 5px;
            border-radius: 10px;
        }
        .breadcrumb{
            margin-left: 40px;
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
            position: fixed;
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
                    <a class="nav-link bebas-neue-regular" href="dashboard.php">Dashboard</a>
                    <a class="nav-link bebas-neue-regular ativo" href="todos.php">Gerir Quartos</a>
                    <a class="nav-link bebas-neue-regular" href="sair.php">Sair</a>
                </div>
            </div>
        </div>
    </nav>

            <div class="container col-12 ">
                <div class="col-md-12 mt-5 text-center align-items-center">
                    <h3 class="text-white mt-3 mb-4">Todos Quartos:</h3>
                    <nav id="breadcrumb" aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item active"><a href="todos.php">Todos</a></li>
                            <li class="breadcrumb-item"><a href="sujos.php">Sujos</a></li>
                            <li class="breadcrumb-item"><a href="pendentes.php">Pendentes</a></li>
                            <li class="breadcrumb-item"><a href="limpos.php">Limpos</a></li>
                            <li class="breadcrumb-item"><a href="disponiveis.php">Disponiveis</a></li>
                            <li class="breadcrumb-item"><a href="indisponiveis.php">Indisponiveis</a></li>
                            <li class="breadcrumb-item"><a href="novos.php">Inserir Quarto</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
            <div class="col-12 " >
                <?php if( isset($_GET['inclusao']) && $_GET['inclusao'] == 1 ) { ?>
			        <div class="bg-success pt-2 text-white d-flex justify-content-center">
				        <h5>Quarto cadastrado com sucesso!</h5>
			        </div>
		        <?php } ?>

                <div class="col-12 mt-5 mb-5">
					<div class="container pagina">
						<div class="row">
							<div class="col">
								<h4>Inserir Novo Quarto</h4>
								<hr />

								<form action="quarto_controller.php" method="POST">
                                    <div class="form-group mb-3 mt-3">
                                        <input type="text" placeholder="Insira o número do quarto. Exemplo: 111" class="form-control" id="numero_quarto" name="numero_quarto" required>
                                    </div>
                                    <input type="hidden" name="action" value="inserir">
                                    <button type="submit" class="botao">Inserir Quarto</button>
                                </form>
							</div>
						</div>
					</div>
				</div>

            </div>
            <footer class="text-white text-center py-1 mt-5">
                <p>&copy; 2024 Finance Manager. Todos os direitos reservados.</p>
            </footer>
        </div>
    </div>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
