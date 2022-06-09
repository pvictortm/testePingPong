<?php
    namespace Bis2Bis;

    interface IPingPongGameInterface {
        /**
         * Essa funcao deve retornar qual jogador e o proximo a sacar ou o vencedor
         *
         * @param  String $score
         * @return String
         */
        function turn($score): string;

        /**
         * Essa funcao deve tratar os inputs retornando 2 valores.
         *
         * @param  String $scores
         * @return array
         */
        function parseScore($scores): array;

    }
?>