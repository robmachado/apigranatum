<?php

namespace ApiGranatum\Factories;

interface FactoryInterface
{
    public function all(array $dados):string;
    public function get(int $id):string;
    public function delete(int $id):string;
    public function add(array $dados):string;
    public function edit(int $id, array $dados):string;
}
