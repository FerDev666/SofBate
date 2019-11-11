<?php

namespace App\Filters\ProductSearch;

use App\Product;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ProductSearch
{
    public static function apply(Request $filters)
    {
        $query = static::applyDecoratorsFromRequest($filters, (new Product)->newQuery());
        return static::getResults($query, $filters);
    }

    private static function applyDecoratorsFromRequest(Request $request, Builder $query)
    {
        foreach ($request->input('filter.filters') as $key => $data) {

            $decorator = static::createFilterDecorator($data['field']);

            if (static::isValidDecorator($decorator)) {
                $query = $decorator::apply($query, $data);
            }
        }
        return $query;
    }

    private static function createFilterDecorator($name)
    {
        return __NAMESPACE__ . '\\Filters\\' . Str::studly($name);
    }

    private static function isValidDecorator($decorator)
    {
        return class_exists($decorator);
    }

    private static function getResults(Builder $query, $request)
    {
        return $query->orderBy('id', 'DESC')->paginate($request->take);
    }
}