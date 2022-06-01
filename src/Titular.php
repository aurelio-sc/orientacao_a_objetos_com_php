<?php

class Titular
{
    private $cpf;
    private $nome;

    public function __construct(Cpf $cpf, string $nome)
    {
        $this->cpf = $cpf;
        $this->validarNomeTitular($nome);
        $this->nome = $nome;
    }

    public function exibirCpf(): string
    {
        return $this->cpf->exibirNumero();
    }

    public function exibirNome(): string
    {
        return $this->nome;
    }

    private function validarNomeTitular(string $nomeTitular)
    {
        if (strlen($nomeTitular)<5){
            echo "O nome precisa ter no mínimo 5 caracteres.";
            exit();
        }
    }

}