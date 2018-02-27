<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProductsRequest as Request;
use App\Product;

class ProductsController extends Controller
{
    public function index(){
        return Product::all();
    }

    public function store(Request $requestEloquent){
        $data = $requestEloquent->all();
        $data['user_id'] = \Auth::user()->id;
        return Product::create($data);
    }

    public function update(Request $requestEloquent, Product $product){
        $product->update($requestEloquent->all());

        return $product;
    }

    public function show(Product $product){
        return $product;
    }

    public function destroy(Request $requestEloquent, Product $product){
        $this->authorize('delete', $product);

        $product->delete();
        return $product;
    }
}
