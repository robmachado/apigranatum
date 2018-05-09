<?php

namespace ApiGranatum\Factories;

use ApiGranatum\Factories\FactoryInterface;
use ApiGranatum\Factories\Factory;
use ApiGranatum\Connector;

class Categorias extends Factory implements FactoryInterface
{
    public $acats = [];
    
    /**
     * Constructor
     * @param Connector $conn
     */
    public function __construct(Connector $conn)
    {
        parent::__construct($conn);
        $this->path = 'categorias';
    }
    
    public function extract($std)
    {
        foreach($std as $cat) {
            if (empty($cat->categorias_filhas)) {
                $this->acats[] = ['child', $cat->id, $cat->descricao]; 
            } else {
                $this->acats[] = ['group', $cat->id, $cat->descricao]; 
                foreach($cat->categorias_filhas as $child) {
                    $this->extract([$child]);
                }
            }
        }
    }
}
