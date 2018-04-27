<?php

namespace ApiGranatum\Factories;

interface FactoryInterface
{
    public function all(array $dados);
    public function get(int $id);
    public function delete(int $id);
    public function add(array $dados);
    public function edit(int $id, array $dados);
}
