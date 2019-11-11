<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use FullTextSearch;

    protected $searchable = [
        'title',
        'category'
    ];
}
