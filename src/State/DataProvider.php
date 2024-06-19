<?php

namespace App\State;

use App\Entity\Greeting;
use ApiPlatform\Metadata\Operation;
use ApiPlatform\State\ProviderInterface;
use ApiPlatform\State\Pagination\TraversablePaginator;
use ApiPlatform\Metadata\CollectionOperationInterface;


final class DataProvider implements ProviderInterface
{
    private $data;

    function __construct()
    {
        $this->data = [
            'ab' => new Greeting('ab'),
            'cd' => new Greeting('cd'),
        ];
    }

    public function provide(Operation $operation, array $uriVariables = [], array $context = []): iterable|Greeting|null
    {
        if ($operation instanceof CollectionOperationInterface) {
            return new TraversablePaginator(new \ArrayObject($this->data), 0, count($this->data), count($this->data));
        }

        return $this->data[$uriVariables['id']] ?? null;
    }
}
