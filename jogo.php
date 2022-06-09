<?php
    namespace Bis2Bis;

    require_once('IPingPongGameInterface.php');
    require_once('Player.php');
    require_once('Placar.php');

    class Jogo implements IPingPongGameInterface
    {   //atributos da classe
        private $playerA;
        private $playerB;
        private $placarA;
        private $placarB;
        //método construtor da orientação a objetos
        function __construct($playerA, $playerB) {
            $this-> StartGame($playerA, $playerB); //após instanciar o jogo, iniciando o startGame
        }
        // score é o placar informado na função turn
        function turn($score): string {
            
                $placares = $this->parseScore($score);

                $this->placarA->setPontuacao($placares[0]); //seleciona a posição do array para determinar o placar de A 
                $this->placarB->setPontuacao($placares[1]); //seleciona a posição do array para determinar o placar de  B

                echo $this-> exibirPlacarAtual();  //imprime o valor do placar

                if ($this->placarA->getPontuacao() < 20 || $this->placarB->getPontuacao() < 20) { //verifica a função do saque de 5 em 5 pontos
                    return $this->definirVezSaque(5);
                }
                else {
                    return $this->definirVezSaque(2);
                }
            }

        function parseScore($scores): array { //parseScore está criando um array de placares
            return explode(':', $scores);
        }

        //
        private function StartGame($playerA, $playerB) {
            echo "Jogo iniciado";
            //This-> atribui os players da classe de Jogo
            $this-> playerA = $playerA;
            $this-> playerB = $playerB;
            // instanciando os placares
            $this-> placarA = new Placar("Placar 1");
            $this-> placarB = new Placar("Placar 2");
        }

        private function primeiraJogada() {
            return $this-> placarA->getPontuacao() == 0 && $this-> placarB->getPontuacao() == 0;
        }

        private function definirVezSaque($qtdSaque) { // soma os placares e divide o total por 5 ou por 2
            $total = $this->placarA->getPontuacao() + $this->placarB->getPontuacao() -1;
            $aux = (int) $total / $qtdSaque; //faz a divisão dos placares e faz um cast transformando o resultado em número inteiro
            if ($total == 0) {
                return $this->playerA->getPlayerName();
            }
            return $aux % 2 == 1 ? $this->playerB->getPlayerName() : $this->playerA->getPlayerName(); //simplificando um if e retorna a função seguinte
        }

        private function exibirPlacarAtual(){ //pega a pontuação de A e B e concatena 
            return $this->placarA->getPontuacao() . ":" . $this->placarB->getPontuacao();
        }
    }    
?>