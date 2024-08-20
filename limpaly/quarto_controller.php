<?php

require_once '../../limpaly/quarto_modelo.php';
require_once '../../limpaly/quarto_service.php';
require_once '../../limpaly/conexao.php';


$acao = isset($_GET['acao']) ? $_GET['acao'] : $acao;

if ($acao == 'recuperar') {
    $id_user = $_SESSION['user_id'];
    $numero_quarto = ''; // Ajuste conforme necessário
    $quarto = new Quarto($id_user, $numero_quarto); // Passando ambos os parâmetros
    $conn = new Conexao();
    $conn = $conn->conectar();

    $quartoService = new QuartoService($conn);
    $quartoController = new QuartoController($quartoService);
    $quartos = $quartoController->recuperar($quarto); // Obter os dados dos quartos

}else if ($acao == 'recuperarSujos') {
    $id_user = $_SESSION['user_id'];
    $numero_quarto = ''; // Ajuste conforme necessário
    $quarto = new Quarto($id_user, $numero_quarto); // Passando ambos os parâmetros
    $conn = new Conexao();
    $conn = $conn->conectar();

    $quartoService = new QuartoService($conn);
    $quartoController = new QuartoController($quartoService);
    $quartos = $quartoController->recuperarSujos($quarto); // Obter os dados dos quartos

}else if ($acao == 'recuperarPendentes') {
    $id_user = $_SESSION['user_id'];
    $numero_quarto = ''; // Ajuste conforme necessário
    $quarto = new Quarto($id_user, $numero_quarto); // Passando ambos os parâmetros
    $conn = new Conexao();
    $conn = $conn->conectar();

    $quartoService = new QuartoService($conn);
    $quartoController = new QuartoController($quartoService);
    $quartos = $quartoController->recuperarPendentes($quarto); // Obter os dados dos quartos

}else if ($acao == 'recuperarLimpos') {
    $id_user = $_SESSION['user_id'];
    $numero_quarto = ''; // Ajuste conforme necessário
    $quarto = new Quarto($id_user, $numero_quarto); // Passando ambos os parâmetros
    $conn = new Conexao();
    $conn = $conn->conectar();

    $quartoService = new QuartoService($conn);
    $quartoController = new QuartoController($quartoService);
    $quartos = $quartoController->recuperarLimpos($quarto); // Obter os dados dos quartos

}else if ($acao == 'recuperarDados') {
    $id_user = $_SESSION['user_id'];
    $numero_quarto = ''; // Ajuste conforme necessário
    $quarto = new Quarto($id_user, $numero_quarto); // Passando ambos os parâmetros
    $conn = new Conexao();
    $conn = $conn->conectar();

    $quartoService = new QuartoService($conn);
    $quartoController = new QuartoController($quartoService);

    $quartosSujos = $quartoController->recuperarSujosCount($quarto); // Obter a contagem dos quartos sujos
    $quartosPendentes = $quartoController->recuperarPendentesCount($quarto); // Obter a contagem dos quartos pendentes
    $quartosLimpos = $quartoController->recuperarLimposCount($quarto); // Obter a contagem dos quartos limpos
    $quartosDispo = $quartoController->recuperarDispoCount($quarto); // Obter a contagem dos quartos disponíveis
    $quartosIndispo = $quartoController->recuperarIndispoCount($quarto); // Obter a contagem dos quartos indisponíveis
    $nomeUser = $quartoController->recuperarNome($quarto); // Obter a contagem do nome do usuario

}else if ($acao == 'recuperarDisponiveis') {
    $id_user = $_SESSION['user_id'];
    $numero_quarto = ''; // Ajuste conforme necessário
    $quarto = new Quarto($id_user, $numero_quarto); // Passando ambos os parâmetros
    $conn = new Conexao();
    $conn = $conn->conectar();

    $quartoService = new QuartoService($conn);
    $quartoController = new QuartoController($quartoService);
    $quartos = $quartoController->recuperarDisponiveis($quarto); // Obter os dados dos quartos

}else if ($acao == 'recuperarIndisponiveis') {
    $id_user = $_SESSION['user_id'];
    $numero_quarto = ''; // Ajuste conforme necessário
    $quarto = new Quarto($id_user, $numero_quarto); // Passando ambos os parâmetros
    $conn = new Conexao();
    $conn = $conn->conectar();

    $quartoService = new QuartoService($conn);
    $quartoController = new QuartoController($quartoService);
    $quartos = $quartoController->recuperarIndisponiveis($quarto); // Obter os dados dos quartos

}else if ($acao == 'atualizar') {
    $id_quarto = $_POST['id_quarto'];
    $numero_quarto = $_POST['numero_quarto'];

    $quarto = new Quarto(null, $numero_quarto); // Criar um objeto Quarto
    $quarto->id_quarto = $id_quarto;

    $conn = new Conexao();
    $conn = $conn->conectar();

    $quartoService = new QuartoService($conn);
    $quartoController = new QuartoController($quartoService);
    $quartoController->atualizar($quarto);

    header('location: todos.php');
}else if ($acao == 'remover') {
    $id_quarto = $_GET['id_quarto'];

    $conn = new Conexao();
    $conn = $conn->conectar();

    $quartoService = new QuartoService($conn);
    $quartoController = new QuartoController($quartoService);
    $quartoController->remover($id_quarto);
    header('location: todos.php');

}else if ($acao == 'marcarRealizada') {
    $id_quarto = $_GET['id_quarto'];
    $id_status_atual = $_GET['id_status'];
    $novo_status_id = 0;

    // Verificar e definir o novo status baseado no status atual
    if ($id_status_atual == 1) {
        $novo_status_id = 2; // Sujo -> Pendente
    } else if ($id_status_atual == 2) {
        $novo_status_id = 3; // Pendente -> Limpo
    } else if ($id_status_atual == 3) {
        $novo_status_id = 1; // Limpo -> Sujo
    } else {
        // Se o id_status_atual não for válido, definir novo_status_id como um valor inválido
        $novo_status_id = 0;
    }

    // Verificar se novo_status_id é válido antes de prosseguir
    if ($novo_status_id != 0) {
        $conn = new Conexao();
        $conn = $conn->conectar();

        $quartoService = new QuartoService($conn);
        $quartoController = new QuartoController($quartoService);
        $quartoController->marcarRealizada($id_quarto, $novo_status_id);
        header('location: todos.php');
    } else {
        echo "Erro: id_status_atual inválido.";
    }
}else if ($acao == 'marcarDisponivel') {
    $id_quarto = $_GET['id_quarto'];
    $id_dispo_atual = $_GET['id_dispo'];
    $novo_dispo_id = 0;

    // Verificar e definir o novo status baseado no status atual
    if ($id_dispo_atual == 1) {
        $novo_dispo_id = 2; // indisponivel -> disponivel
    } else if ($id_dispo_atual == 2) {
        $novo_dispo_id = 1; // disponivel -> indisponivel
    }else {
        // Se o id_status_atual não for válido, definir novo_status_id como um valor inválido
        $novo_dispo_id = 0;
    }

    // Verificar se novo_status_id é válido antes de prosseguir
    if ($novo_dispo_id != 0) {
        $conn = new Conexao();
        $conn = $conn->conectar();

        $quartoService = new QuartoService($conn);
        $quartoController = new QuartoController($quartoService);
        $quartoController->marcarDisponivel($id_quarto, $novo_dispo_id);
        header('location: todos.php');
    } else {
        echo "Erro: id_status_atual inválido.";
    }
}

class QuartoController {
    private $quartoService;

    public function __construct($quartoService) {
        $this->quartoService = $quartoService;
    }

    public function inserirQuarto($data) {
        $id_user = $_SESSION['user_id']; // Obtém o ID do usuário da sessão
        $numero_quarto = $data['numero_quarto'];
        $quarto = new Quarto($id_user, $numero_quarto);
        $result = $this->quartoService->inserirQuarto($quarto);

        if ($result) {
            header('location: novos.php?inclusao=1');
        } else {
            echo "Erro ao inserir quarto.";
        }
    }

    public function atualizar($quarto) {
        return $this->quartoService->atualizar($quarto);
    }

    public function remover($id_quarto) {
        return $this->quartoService->remover($id_quarto);
    }

    public function marcarRealizada($id_quarto, $novo_status_id) {
        return $this->quartoService->marcarRealizada($id_quarto, $novo_status_id);
    }

    public function marcarDisponivel($id_quarto, $novo_dispo_id) {
        return $this->quartoService->marcarDisponivel($id_quarto, $novo_dispo_id);
    }

    public function recuperar($quarto) {
        return $this->quartoService->recuperar($quarto);
    }

    public function recuperarSujos($quarto) {
        return $this->quartoService->recuperarSujos($quarto);
    }

    public function recuperarPendentes($quarto) {
        return $this->quartoService->recuperarPendentes($quarto);
    }

    public function recuperarLimpos($quarto) {
        return $this->quartoService->recuperarLimpos($quarto);
    }

    public function recuperarSujosCount($quarto) {
        return $this->quartoService->recuperarSujosCount($quarto);
    }

    public function recuperarPendentesCount($quarto) {
        return $this->quartoService->recuperarPendentesCount($quarto);
    }

    public function recuperarLimposCount($quarto) {
        return $this->quartoService->recuperarLimposCount($quarto);
    }

    public function recuperarDispoCount($quarto) {
        return $this->quartoService->recuperarDispoCount($quarto);
    }

    public function recuperarIndispoCount($quarto) {
        return $this->quartoService->recuperarIndispoCount($quarto);
    }

    public function recuperarNome($quarto) {
        return $this->quartoService->recuperarNome($quarto);
    }

    public function recuperarDisponiveis($quarto) {
        return $this->quartoService->recuperarDisponiveis($quarto);
    }

    public function recuperarIndisponiveis($quarto) {
        return $this->quartoService->recuperarIndisponiveis($quarto);
    }
}

// A função inserirQuarto só será chamada ao submeter o formulário
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if (isset($_POST['action']) && $_POST['action'] == 'inserir') {
        $conn = new Conexao();
        $conn = $conn->conectar();

        $quartoService = new QuartoService($conn);
        $quartoController = new QuartoController($quartoService);
        $quartoController->inserirQuarto($_POST);
    }
}
?>
