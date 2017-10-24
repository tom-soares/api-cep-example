<?php

namespace App\GraphQL\Mutation;

use GraphQL;
use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Mutation;
use App\Place;

class UpdatePlaceNameMutation extends Mutation
{
    protected $attributes = [
        'name' => 'updatePlaceName'
    ];

    public function type()
    {
        return GraphQL::type('Place');
    }

    public function args()
    {
        return [
            'id' => ['name' => 'id', 'type' => Type::nonNull(Type::string())],
            'name' => ['name' => 'name', 'type' => Type::nonNull(Type::string())]
        ];
    }

    public function resolve($root, $args)
    {
        $place = Place::find($args['id']);

        if (!$place) {
            return null;
        }

        $place->name = $args['name'];
        $place->save();

        return $place;
    }
}
