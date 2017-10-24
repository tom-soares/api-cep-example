<?php

namespace App\GraphQL\Query;

use GraphQL;
use App\User;
use App\Place;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Query;

class PlacesQuery extends Query
{
    protected $attributes = [
        'name' => 'places'
    ];

    public function type()
    {
        return Type::listOf(GraphQL::type('Place'));
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::string()],
            'cep' => ['name' => 'cep', 'type' => Type::string()],
            'name' => ['name' => 'name', 'type' => Type::string()],
            'number' => ['name' => 'number', 'type' => Type::string()],
        ];
    }

    public function resolve($root, $args)
    {
        $query = (new Place())->newQuery();
        foreach ($this->args() as $key => $condition) {
            if (isset($args[$key])) {
                $query->where($key, $args[$key]);
            }
        }

        return $query->get();
    }
}
