<?php

class Conta
{
    private $titular;
    private $saldo;
    private static $numeroDeContas; //atributos e métodos estáticos se referem à classe e não à instância.

    public function __construct(Titular $titular) // __construct é o nome padrão do construtor.
    {
        $this->titular = $titular;
        $this->saldo = 0;

        self::$numeroDeContas++; //self está para a classe assim como $this está para a instância.
    }

    public function __destruct() // __destruct é o nome padrão do destrutor. Ele apaga instâncias sem referência de uma variável.
    {
        self::$numeroDeContas--;
    }

    public function sacar(float $valorASacar): void  //void = o método não retorna nada.
    {
        if ($valorASacar > $this->saldo) {
            echo "Saldo indisponível" . PHP_EOL;
            return;
        }
            $this->saldo -= $valorASacar;
    }

    public function depositar(float $valorADepositar): void
    {
        if ($valorADepositar < 0) {
            echo "O valor depositado precisar ser positivo." . PHP_EOL;
            return;
        }
        $this->saldo += $valorADepositar;
    }

    public function transferir(float $valorATransferir, Conta $contaDestino): void
    {
        if ($valorATransferir > $this->saldo){
            echo "Saldo indisponível" . PHP_EOL;
            return;
        }
            $this->sacar($valorATransferir);
            $contaDestino->depositar($valorATransferir);
    }

    public function exibirSaldo(): float
    {
        return $this->saldo;
    }

    public static function exibirNumeroDeContas(): int
    {
        return self::$numeroDeContas;
    }

    public function exibirNomeTitular(): string
    {
        return $this->titular->exibirNome();
    }

    public function exibirCpfTitular(): string
    {
        return $this->titular->exibirCpf();
    }
}