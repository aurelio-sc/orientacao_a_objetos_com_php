<?php

class Cpf
{
    private $numero;

    public function __construct(string $numero)
    {
        $this->numero = $numero;
    }

    public function exibirNumero(): string
    {
        return $this->numero;
    }


}