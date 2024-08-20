
<?php
    $acao = 'recuperarDados';
    require "quarto_controller.php";

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Finance Manager</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
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
            margin-top: 20px;
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
            <a class="navbar-brand ga-maamli-regular" href="#"><img src="img/logob.png" class="me-2" width="75px" height="75px" alt=""> FinanGest</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav justify-content-end d-flex gap-2 mt-2 mt-lg-0 ms-auto ">
                    <a class="nav-link bebas-neue-regular ativo" href="dashboard.php">Dashboard</a>
                    <a class="nav-link bebas-neue-regular" href="todos.php">Gerir Quartos</a>
                    <a class="nav-link bebas-neue-regular" href="sair.php">Sair</a>
                </div>
            </div>
        </div>
    </nav>


        <div class="container">
            <div class="col-12 ml-sm-auto">
                <h5 class="mt-3 text-bold text-white">Seja bem vindo: <span class="text-success text-bold"><?=$nomeUser?></span></h5> 
                <div class="row mt-3">
                    <!-- cards quartos -->
                    <div class="col-md-4 mb-3">
                        <div class="card text-white bg-success" style="height: 150px;">
                            <div class="card-body">
                                <h4>Quartos Limpos</h4>
                                <hr>
                                <h5>Total: <?=$quartosLimpos?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card text-white bg-warning" style="height: 150px;">
                            <div class="card-body">
                                <h4>Quartos Pendentes</h4>
                                <hr>
                                <h5>Total: <?=$quartosPendentes?></h5>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mb-3">
                        <div class="card text-white bg-danger" style="height: 150px;">
                            <div class="card-body">
                                <h4>Quartos Sujos</h4>
                                <hr>
                                <h5>Total: <?=$quartosSujos?></h5>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row text-center mt-3">
                    <div class="col-md-6 col-12 mb-3">
                        <h2 class="text-white">Gráfico status</h2>
                        <canvas id="savingsChart"></canvas>
                    </div>

                    <div class="col-md-6 col-12 mb-3">
                        <h2 class="text-white">Gráfico disponibilidade</h2>
                        <canvas id="savingsChart2"></canvas>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 mb-3 mt-5">
                            <div class="card text-white " style="height: 150px; width: 400px;">
                                <div class="card-body">
                                    <h4>Quartos Disponiveis</h4>
                                    <hr>
                                    <h5>Total: <?=$quartosDispo?></h5>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 mb-3 mt-5">
                            <div class="card text-white" style="height: 150px; width: 400px;">
                                <div class="card-body">
                                    <h4>Quartos Indisponiveis</h4>
                                    <hr>
                                    <h5>Total: <?=$quartosIndispo?></h5>
                                </div>
                            </div>
                        </div>
                    </div>

            </div>
        </div>
        <footer class="text-white text-center py-1 mt-5">
                <p>&copy; 2024 Finance Manager. Todos os direitos reservados.</p>
            </footer>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.5.4/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Script para Gráfico de Pizza
        var ctx3 = document.getElementById('savingsChart').getContext('2d');
        var savingsChart = new Chart(ctx3, {
            type: 'pie',
            data: {
                labels: ['Limpos', 'Pendentes', 'Sujos'],
                datasets: [{
                    label: 'Distribuição das Reservas',
                    data: [<?=$quartosLimpos?>, <?=$quartosPendentes?>, <?=$quartosSujos?>],
                    backgroundColor: [
                        'rgba(0, 255, 0, 0.5)',
                        'rgba(255, 0, 0, 0.5)',
                        'rgba(255, 255, 0, 0.5)',
                    ],
                    borderColor: [
                        'rgba(0, 255, 0)',
                        'rgba(255, 0, 0)',
                        'rgba(255, 255, 0)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' USD';
                            }
                        }
                    }
                }
            }
        });

        // Script para Gráfico de Pizza disponibilidade
        var ctx3 = document.getElementById('savingsChart2').getContext('2d');
        var savingsChart = new Chart(ctx3, {
            type: 'pie',
            data: {
                labels: ['Disponivel', 'Indisponivel'],
                datasets: [{
                    label: 'Distribuição das Reservas',
                    data: [<?=$quartosDispo?>, <?=$quartosIndispo?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.2)',
                        'rgba(255, 99, 132, 0.2)',
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)',
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    tooltip: {
                        callbacks: {
                            label: function(tooltipItem) {
                                return tooltipItem.label + ': ' + tooltipItem.raw + ' USD';
                            }
                        }
                    }
                }
            }
        });
    </script>

</body>
</html>
