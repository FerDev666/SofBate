<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;
use App\Filters\ProductSearch\ProductSearch;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        // $products = Product::orderBy('id', 'DESC');
        // if ($request->has('filter')) {
        //     $filter = $request->input('filter.filters.0.value');
        //     $products = $products->where('title', 'like', '%' . $filter . '%');
        // }

        // $products = $products->paginate(5);
        // return response()->json($request->input('sort'), 200);

        if ($request->has('filter') && !empty($request->input('filter.filters'))) {
            return ProductSearch::apply($request);
        }

        if ($request->has('sort')) {
            $sort = $request->input('sort');
            $products = Product::orderBy($sort[0]['field'], $sort[0]['dir'])->paginate($request->take);
            return response()->json($products, 200);
        }

        $products = Product::orderBy('id', 'DESC')->paginate($request->take);
        return response()->json($products, 200);
        
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Product $product)
    {
        //
    }

    public function update(Request $request, Product $product)
    {
        //
    }

    public function destroy(Product $product)
    {
        //
    }
}
