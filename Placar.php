<?php
     namespace Bis2Bis;
     class Placar {
        private $nome;
        private $pontos;

        function __construct($nome) {
            $this->nome = $nome;
            $this->pontos = 0;
        }

        function getNome() {
            return $this->nome;
        }

        function setPontuacao($pontos) {
            if ($pontos < $this-> pontos) return;

            $this->pontos = $pontos;
        }

        function getPontuacao() {
            return $this->pontos;
        }
    }
?>