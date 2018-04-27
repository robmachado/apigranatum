<?php

namespace ApiGranatum;

use ApiGranatum\Connector;
use ApiGranatum\Factories;

class Granatum
{
    private static $available = [
        'bancos' => Factories\Bancos::class,
        'categorias' => Factories\Categorias::class,
        'centros' => Factories\Centros::class,
        'cidades' => Factories\Cidades::class,
        'clientes' => Factories\Clientes::class,
        'cobrancas' => Factories\Cobrancas::class,
        'contas' => Factories\Contas::class,
        'estados' => Factories\Estados::class,
        'formaspagto' => Factories\FormasPagto::class,
        'fornecedores' => Factories\Fornecedores::class,
        'lancamentos' => Factories\Lancamentos::class
    ];
    
    public static function __callStatic($name, $arguments)
    {
        $name = str_replace('-', '', strtolower($name));
        $realname = $name;
        if (!array_key_exists($realname, self::$available)) {
            throw new \Exception("Esta classe $name não foi localizada.");
        }
        $className = self::$available[$realname];
        if (empty($arguments[0])) {
            throw new \Exception('Faltam parametros');
        }
        return new $className($arguments[0]);
    }
}
