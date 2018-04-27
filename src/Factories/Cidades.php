<?php

namespace ApiGranatum\Factories;

use ApiGranatum\Factories\FactoryInterface;
use ApiGranatum\Factories\Factory;
use ApiGranatum\Connector;

class Cidades extends Factory implements FactoryInterface
{
    /**
     * Constructor
     * @param Connector $conn
     */
    public function __construct(Connector $conn)
    {
        parent::__construct($conn);
        $this->path = 'cidades';
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
     * @return bool
     */
    public function delete(int $id):bool
    {
        return false;
    }
}
