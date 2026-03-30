<?php

class HorasTrabalhadas
{
    public $horarioEntrada;
    public $horaSaida;
    public $temIntervalo;
    public $retornoTrabalhado;

    public function calculaHorasTrabalhadas($horarioEntrada, $horaSaida, $temIntervalo)
    {
        $this->horarioEntrada = $horarioEntrada;
        $this->horaSaida = $horaSaida;
        $this->temIntervalo = $temIntervalo;

        if ($this->horarioEntrada >= 0 && $this->horarioEntrada <= 23) {
            
            if ($this->horaSaida > $this->horarioEntrada) {
                
                $this->retornoTrabalhado = $this->horaSaida - $this->horarioEntrada;
                
                if ($this->temIntervalo === true) {
                    $this->retornoTrabalhado = $this->retornoTrabalhado - 1;
                }
                
                if ($this->retornoTrabalhado <= 12 && $this->retornoTrabalhado >= 1) {
                    return $this->retornoTrabalhado;
                } else if ($this->retornoTrabalhado > 12) {
                    return "erro (jornada > 12h)";
                } else {
                    return "erro (jornada < 1h)";
                }
                
            } else {
                return "erro (saída < entrada)";
            }
            
        } else {
            return "erro (entrada inválida)";
        }
    }
}

$teste = new HorasTrabalhadas();

echo $teste->calculaHorasTrabalhadas(8, 17, true) . "\n";
echo $teste->calculaHorasTrabalhadas(8, 12, false) . "\n";
echo $teste->calculaHorasTrabalhadas(17, 8, false) . "\n";
echo $teste->calculaHorasTrabalhadas(8, 22, false) . "\n";

?>