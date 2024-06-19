<?php

namespace App\Entity;

use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\GraphQl\DeleteMutation;
use ApiPlatform\Metadata\GraphQl\Mutation;
use ApiPlatform\Metadata\GraphQl\Query;
use ApiPlatform\Metadata\GraphQl\QueryCollection;
use App\State\DataProvider;
use App\State\DataPersister;
use Symfony\Component\Validator\Constraints as Assert;


#[ApiResource(
    processor: DataPersister::class,
    provider: DataProvider::class,
    graphQlOperations: [
        new Query(),
        new QueryCollection(),
        new DeleteMutation(
            name: 'delete'
        )
    ]
)]
class Greeting
{
    private ?string $id = null;

    public string $name = '';

    public function __construct($id)
    {
        $this->id = $id;
        $this->name = $id;
    }

    public function getId(): ?string
    {
        return $this->id;
    }
}
