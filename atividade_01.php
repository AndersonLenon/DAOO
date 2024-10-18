<?php

class IMC {

    public static function calc($paciente) {
        $imc = $paciente->peso / ($paciente->altura * $paciente->altura);
        return number_format($imc, 2); 
    }

    public static function classifica($paciente) {
        $imc = self::calc($paciente); 

        if ($imc < 18.5) {
            return "Abaixo do peso";
        } elseif ($imc >= 18.5 && $imc <= 24.9) {
            return "Saudável";
        } elseif ($imc >= 25 && $imc <= 29.9) {
            return "Sobrepeso";
        } else {
            return "Obesidade";
        }
    }
}

class Paciente {
    public $peso;
    public $altura;

    public function __construct($peso, $altura) {
        $this->peso = $peso;
        $this->altura = $altura;
    }
}

$paciente = new Paciente(70, 1.75); 

$imc = IMC::calc($paciente);
$classificacao = IMC::classifica($paciente);

echo "IMC: $imc\n";
echo "Classificação: $classificacao\n";
