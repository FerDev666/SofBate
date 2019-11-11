<?php

namespace App\Filters\Types;

use Illuminate\Database\Eloquent\Builder;
use App\Filters\Types\IsEqualTo;
use App\Filters\Types\Contains;

class TypesFilter
{
    protected $types = [
        'qe'       => IsEqualTo::class,
        'contains' => Contains::class,
    ];

    public function run(Builder $builder, Array $data)
    {
        $type = new $this->types[$data['operator']];
        return $type->search($builder, $data);
    }
}