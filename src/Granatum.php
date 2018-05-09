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
        'lancamentos' => Factories\Lancamentos::class,
        'tipocustoapropriacao' => Factories\TipoCustoApropriacao::class,
        'tipocustonivel' => Factories\TipoCustoNivel::class,
        'tipolancamento' => Factories\TipoLancamento::class,
        'tipodocumentofiscal' => Factories\TipoDocumentoFiscal::class,
    ];
    
    /**
     * Statically calls and loads the desired class
     * @param string $name
     * @param array $arguments
     * @return object
     * @throws \Exception
     */
    public static function __callStatic($name, $arguments)
    {
        $name = strtolower($name);
        if (!array_key_exists($name, self::$available)) {
            throw new \Exception("Esta classe $name não foi localizada.");
        }
        $className = self::$available[$name];
        if (empty($arguments[0])) {
            throw new \Exception('Falta Connector::class passada como parametro.');
        }
        return new $className($arguments[0]);
    }
}
