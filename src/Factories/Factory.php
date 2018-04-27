<?php

namespace ApiGranatum\Factories;

use ApiGranatum\Factories\FactoryInterface;
use ApiGranatum\Connector;

class Factory implements FactoryInterface
{
    /**
     * @var string
     */
    protected $path;
    /**
     * @var Connector
     */
    protected $conn;
    
    /**
     * Constructor
     * @param Connector $conn
     */
    public function __construct(Connector $conn)
    {
        if (!is_a($conn, 'ApiGranatum\Connector')) {
            throw new \Exception('O conector é obrigatório.');
        }
        $this->conn = $conn;
    }
    
    /**
     * Retrive all $this->path
     * @return string
     */
    public function all(array $dados = null):string
    {
        return $this->conn->get($this->path, $dados);
    }

    /**
     * Get $this->path by id
     * @param int $id
     */
    public function get(int $id):string
    {
        return $this->conn->get($this->path . '/' . $id);
    }
    
    /**
     * Edit $this->path by id
     * @param int $id
     * @param array $dados
     * @return string
     */
    public function edit(int $id, array $dados):string
    {
        return $this->conn->put($this->path . '/' . $id, $dados);
    }
    
    /**
     * Add $this->path
     * @param array $dados
     * @return string
     */
    public function add(array $dados):string
    {
        return $this->conn->post($this->path, $dados);
    }

    /**
     * Remove $this->path  by id
     * @param int $id
     * @return bool
     */
    public function delete(int $id):bool
    {
        return $this->conn->delete($this->path . '/' . $id);
    }
}
