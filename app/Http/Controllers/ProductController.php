<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function listing()
    {
        return view('product.product-listing');
    }

    public function show($id)
    {
        return view('product.product-detail', ['productId' => $id]);
    }

    public function apiIndex()
    {
        // Return products as JSON for Vue components
        return response()->json([
            'products' => [
                // Your product data here - you can fetch from database
            ]
        ]);
    }

    public function apiShow($id)
    {
        // Return single product as JSON
        return response()->json([
            'product' => [
                'id' => $id,
                // Your product data here
            ]
        ]);
    }
}
