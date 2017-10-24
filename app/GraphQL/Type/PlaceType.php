<?php

namespace App\GraphQL\Type;

use GraphQL\Type\Definition\Type;
use Folklore\GraphQL\Support\Type as GraphQLType;

class PlaceType extends GraphQLType
{
    protected $attributes = [
        'name' => 'Place',
        'description' => 'A place'
    ];

    /*
    * Uncomment following line to make the type input object.
    * http://graphql.org/learn/schema/#input-types
    */
    // protected $inputObject = true;

    public function fields()
    {
        return [
            'id' => [
                'type' => Type::nonNull(Type::string()),
                'description' => 'The id of the place'
            ],
            'cep' => [
                'type' => Type::string(),
                'description' => 'The cep of the place'
            ],
            'name' => [
                'type' => Type::string(),
                'description' => 'The name of the place'
            ],
            'number' => [
                'type' => Type::string(),
                'description' => 'The building number of the place'
            ],
        ];
    }
}