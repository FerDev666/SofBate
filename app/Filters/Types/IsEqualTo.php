<?php

namespace App\Filters\Types;

use Illuminate\Database\Eloquent\Builder;

class IsEqualTo implements TypeQuery
{
    public function search(Builder $builder, Array $data)
    {
        return $builder->where($data['field'], $data['value']);
    }
}