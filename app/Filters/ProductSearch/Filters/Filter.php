<?php

namespace App\Filters\ProductSearch\Filters;

use Illuminate\Database\Eloquent\Builder;

interface Filter
{
    /**
     * Apply a given search value to the builder instance.
     *
     * @param Builder $builder
     * @param Array $data
     * @return Builder $builder
     */
    public static function apply(Builder $builder, Array $data);
}