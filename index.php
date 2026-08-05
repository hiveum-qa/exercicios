<?php
class Telefone {
    private string $numero;

    public function __construct(string $numero){
       $this->numero = $numero;
    }

    public function formatarTelefone() {

        $numeroLimpo = preg_replace('/\D/', '', $this->numero);
        $tamanhoNumero = strlen($numeroLimpo);
        
        if ($tamanhoNumero == 11) {
            return sprintf('(%s) %s-%s', 
            substr($numeroLimpo, 0, 2), 
            substr($numeroLimpo, 2, 5), 
            substr($numeroLimpo, 7, 4));
        }
        if ($tamanhoNumero == 10) {
            return sprintf('(%s) %s-%s', 
            substr($numeroLimpo, 0, 2), 
            substr($numeroLimpo, 2, 4), 
            substr($numeroLimpo, 6, 4));
        }
        return $this->numero;
    }

    public function numeroMostrado(string $numeroMostrado) {
        echo $this->formatarTelefone($numeroMostrado);
    }
}

class Apartamento {

    public string $identificacao;
    /**
     * @var Telefone[]
     */
    public array $telefones = [];

    #pega a identificaçao que eu vou criar e coloca dentro da minha identificação
    public function __construct(string $identificacao) {
        $this->identificacao = $identificacao;
    }

    public function getIdentificacao(): string {
        return $this->identificacao;
    }
    /**
     * @return Telefone[]
     */
     public function getTelefones(): array {
        return $this->telefones;
    }

    public function adicionarTelefone(string $telefone) {
        if (count($this->telefones) >= 4) {
            return false;
        }
        $this->telefones[] = new Telefone($telefone);
        return true;
    }

    public function getTelefonesFormatados(): array {
        $formatados = [];
        foreach ($this->telefones as $tel) {
            $formatados[] = $tel->formatarTelefone();
        }
        return $formatados;
    }
}

class Agenda {  
     /**
     * @var Apartamento[]
     */

    public array $apartamentos = [];


    function adicionarApartamento(Apartamento $apartamento){
        $this->apartamentos[] = $apartamento;
    }

    function mostrar(){
        foreach ($this->apartamentos as $ap) {
            echo $ap->getIdentificacao();
            $telefones = $ap->getTelefones();

            #verifica se esta vazia 
            if (empty($telefones)) {
                echo "Nenhum telefone cadastrado".PHP_EOL;
            } else {
                foreach ($telefones as $tel) {
                    echo "Número Telefone:". $tel->formatarTelefone().PHP_EOL;
                }
            }

        }
    }

}
    
    $agenda = new Agenda();

    $agenda ->adicionarApartamento(new Apartamento("201"));
    $agenda ->adicionarApartamento(new Apartamento("202"));
    $agenda ->adicionarApartamento(new Apartamento("203"));
    $agenda ->adicionarApartamento(new Apartamento("204"));

   $agenda ->apartamentos[1] ->adicionarTelefone("(51)999999999");
   

    $agenda->mostrar();



















