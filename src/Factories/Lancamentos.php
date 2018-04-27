<?php

namespace ApiGranatum\Factories;

use ApiGranatum\Factories\FactoryInterface;
use ApiGranatum\Factories\Factory;
use ApiGranatum\Connector;

class Lancamentos extends Factory implements FactoryInterface
{
    /**
     * Constructor
     * @param Connector $conn
     */
    public function __construct(Connector $conn)
    {
        parent::__construct($conn);
        $this->path = 'lancamentos';
    }
}
