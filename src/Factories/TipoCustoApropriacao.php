<?php

namespace ApiGranatum\Factories;

use ApiGranatum\Factories\FactoryInterface;
use ApiGranatum\Factories\Factory;
use ApiGranatum\Connector;

class TipoCustoApropriacao extends Factory implements FactoryInterface
{
    /**
     * Constructor
     * @param Connector $conn
     */
    public function __construct(Connector $conn)
    {
        parent::__construct($conn);
        $this->path = 'tipos_custo_apropriacao_produto';
    }
    
    /**
     * Edit $this->path by id
     * NOTE: do not exists this method
     * @param int $id
     * @param array $dados
     * @return string
     */
    public function edit(int $id, array $dados):string
    {
        return '';
    }
    
    /**
     * Add $this->path
     * NOTE: do not exists this method
     * @param array $dados
     * @return string
     */
    public function add(array $dados):string
    {
        return '';
    }

    /**
     * Remove $this->path  by id
     * NOTE: do not exists this method
     * @param int $id
     * @return string
     */
    public function delete(int $id):string
    {
        return "false";
    }
}
