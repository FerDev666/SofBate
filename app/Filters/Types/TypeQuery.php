<?php

namespace App\Filters\Types;

use Illuminate\Database\Eloquent\Builder;

interface TypeQuery
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param Array $data
     * @return Builder $builder
     */
    public function search(Builder $builder, Array $data);
}