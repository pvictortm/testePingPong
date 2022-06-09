<?php
    namespace Bis2Bis;

    class Player
    {
        // propriedade nome do jogador, será setada apenas no momento da construção do objeto jogador
        private $playerName;

        /**
         * construtor da classe Player, recebe o nome do jogador como parâmetro e define a propriedade $playerName
         *
         * @param String $playerName
         */
        function __construct($playerName)
        {
            $this->playerName = $playerName;
        }

        /**
         * Retorna o nome do jogador já que a propriedade é privada
         *
         * @return String
         */
        function getPlayerName()
        {
            return $this->playerName;
        }
    }
?>