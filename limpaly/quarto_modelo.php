<?php

class Quarto {
    public $id_user;
    public $numero_quarto;

    public function __construct($id_user, $numero_quarto) {
        $this->id_user = $id_user;
        $this->numero_quarto = $numero_quarto;
    }
}

?>
