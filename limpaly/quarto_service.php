<?php
session_start();
require_once 'conexao.php';
require_once 'quarto_modelo.php';

// Verifica se o usuário está logado
if (!isset($_SESSION['user_id'])) {
    header('location: negado.php');
}

class QuartoService {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function inserirQuarto($quarto) {
        try {
            $sql = "INSERT INTO tb_quarto (id_user, numero_quarto) VALUES (:id_user, :numero_quarto)";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_user', $quarto->id_user);
            $stmt->bindParam(':numero_quarto', $quarto->numero_quarto);
            $stmt->execute();
            return $this->conn->lastInsertId();
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }

    public function atualizar($quarto) {
        try {
            $query = "UPDATE tb_quarto SET numero_quarto = :numero_quarto WHERE id_quarto = :id_quarto";
            $stmt = $this->conn->prepare($query);
            $stmt->bindParam(':numero_quarto', $quarto->numero_quarto);
            $stmt->bindParam(':id_quarto', $quarto->id_quarto);
            return $stmt->execute();
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }

    public function remover($id_quarto) { //delete
        $query = 'DELETE FROM tb_quarto WHERE id_quarto = :id_quarto';
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':id_quarto', $id_quarto);
        return $stmt->execute();
    }

    public function marcarRealizada($id_quarto, $novo_status_id) {
        $query = "UPDATE tb_quarto SET id_status = :novo_status_id WHERE id_quarto = :id_quarto";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':novo_status_id', $novo_status_id);
        $stmt->bindParam(':id_quarto', $id_quarto);
        return $stmt->execute();
    }

    public function marcarDisponivel($id_quarto, $novo_dispo_id) {
        $query = "UPDATE tb_quarto SET id_dispo = :novo_dispo_id WHERE id_quarto = :id_quarto";
        $stmt = $this->conn->prepare($query);
        $stmt->bindParam(':novo_dispo_id', $novo_dispo_id);
        $stmt->bindParam(':id_quarto', $id_quarto);
        return $stmt->execute();
    }

    public function recuperar($quarto) {
        try {
            $sql = '
                SELECT 
                    t.id_dispo, s.id, t.numero_quarto, t.id_status, t.id_quarto
                FROM 
                    tb_quarto as t
                    LEFT JOIN tb_status as s ON (t.id_status = s.id)
                WHERE 
                    t.id_user = :id_user
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_user', $quarto->id_user);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }

    public function recuperarSujos($quarto) {
        try {
            $sql = '
                SELECT 
                    t.id_dispo, s.id, t.numero_quarto, t.id_status, t.id_quarto
                FROM 
                    tb_quarto as t
                    LEFT JOIN tb_status as s ON (t.id_status = s.id)
                WHERE 
                    t.id_user = :id_user
                    AND t.id_status = 1
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_user', $quarto->id_user);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }

    public function recuperarPendentes($quarto) {
        try {
            $sql = '
                SELECT 
                    t.id_dispo, s.id, t.numero_quarto, t.id_status, t.id_quarto
                FROM 
                    tb_quarto as t
                    LEFT JOIN tb_status as s ON (t.id_status = s.id)
                WHERE 
                    t.id_user = :id_user
                    AND t.id_status = 2
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_user', $quarto->id_user);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }

    public function recuperarLimpos($quarto) {
        try {
            $sql = '
                SELECT 
                    t.id_dispo, s.id, t.numero_quarto, t.id_status, t.id_quarto
                FROM 
                    tb_quarto as t
                    LEFT JOIN tb_status as s ON (t.id_status = s.id)
                WHERE 
                    t.id_user = :id_user
                    AND t.id_status = 3
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_user', $quarto->id_user);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }

    public function recuperarDisponiveis($quarto) {
        try {
            $sql = '
                SELECT 
                    t.id_dispo, s.id, t.numero_quarto, t.id_status, t.id_quarto
                FROM 
                    tb_quarto as t
                    LEFT JOIN tb_status as s ON (t.id_status = s.id)
                WHERE 
                    t.id_user = :id_user
                    AND t.id_dispo = 2
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_user', $quarto->id_user);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }

    public function recuperarIndisponiveis($quarto) {
        try {
            $sql = '
                SELECT 
                    t.id_dispo, s.id, t.numero_quarto, t.id_status, t.id_quarto
                FROM 
                    tb_quarto as t
                    LEFT JOIN tb_status as s ON (t.id_status = s.id)
                WHERE 
                    t.id_user = :id_user
                    AND t.id_dispo = 1
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_user', $quarto->id_user);
            $stmt->execute();
            return $stmt->fetchAll(PDO::FETCH_OBJ);
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }

    public function recuperarSujosCount($quarto) {
        try {
            $sql = '
                SELECT COUNT(*)
                FROM 
                    tb_quarto 
                WHERE 
                    id_user = :id_user
                    AND id_status = 1
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_user', $quarto->id_user);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }
    
    public function recuperarPendentesCount($quarto) {
        try {
            $sql = '
                SELECT COUNT(*)
                FROM 
                    tb_quarto 
                WHERE 
                    id_user = :id_user
                    AND id_status = 2
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_user', $quarto->id_user);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }
    
    public function recuperarLimposCount($quarto) {
        try {
            $sql = '
                SELECT COUNT(*)
                FROM 
                    tb_quarto 
                WHERE 
                    id_user = :id_user
                    AND id_status = 3
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_user', $quarto->id_user);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }
    
    public function recuperarDispoCount($quarto) {
        try {
            $sql = '
                SELECT COUNT(*)
                FROM 
                    tb_quarto 
                WHERE 
                    id_user = :id_user
                    AND id_dispo = 1
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_user', $quarto->id_user);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }
    
    public function recuperarIndispoCount($quarto) {
        try {
            $sql = '
                SELECT COUNT(*)
                FROM 
                    tb_quarto 
                WHERE 
                    id_user = :id_user
                    AND id_dispo = 2
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_user', $quarto->id_user);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }

    public function recuperarNome($quarto) {
        try {
            $sql = '
                SELECT
                    nome
                FROM 
                    tb_users
                WHERE 
                    id = :id_user
                    
            ';
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':id_user', $quarto->id_user);
            $stmt->execute();
            return $stmt->fetchColumn();
        } catch (PDOException $e) {
            echo "Erro: " . $e->getMessage();
            return false;
        }
    }
    
}
?>
