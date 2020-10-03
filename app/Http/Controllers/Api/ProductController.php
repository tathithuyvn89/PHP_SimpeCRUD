<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class ProductController extends Controller
{
    public function store(Request $request) {

    
        $inputProduct = array(
            'title' => $request->input('title'),
            'product_code' =>$request->input('product_code'),
            'description' => $request ->input('description')

        );

        $newProduct = Product::create($inputProduct);
        
        if ($newProduct) {

            return response()->json([
                'data'=>[
                    'type'=> 'Products',
                    'message' => 'Create success',
                    'id' => $newProduct->id,
                    'attribute'=>$newProduct
                ]
                ],201);
        } else {
            return response()->json([
                'type' =>'Products',
                'message'=>'Fail'
            ],400);
        }
        
    }

    public function index() {

        $products = Product::all();

        return response()->json([
            'data'=>$products
        ]);
    
    }

    public function update(Request $request, $product_id) {

        $productById = Product::find($product_id);

        if ($productById) {
            
            $productById->title = $request->input('title');
            $productById->product_code = $request->input('product_code');
            $productById->description = $request->input('description');
            $productById->save();

            return response()->json([
                'data'=>[
                    'type'=>'Product',
                    'message'=>'Update success',
                    'id'=>$productById->id,
                    'attribute' => $productById
                ]
                ], 201);
            
        } else {

            return response() ->json([
                'type'=>'Product',
                'message'=>'Not Found'
            ],404);

        }

    }

    public function show($product_id) {

        $productById = Product::find($product_id);
        if ($productById) {
            
            return response()->json([
                'data'=>[
                    'type'=>'Product',
                    'message'=>'Update success',
                    'id'=>$productById->id,
                    'attribute' => $productById
                ]
                ], 201);
            
        } else {

            return response() ->json([
                'type'=>'Product',
                'message'=>'Not Found'
            ],404);

        }
        

    }

    public function delete($product_id) {
        $productById = Product::find($product_id);
        if ($productById) {
            
            $productById->delete();
            return response()->json([
                'data'=>[
                    'type'=>'Product',
                    'message'=>'Delete success',
            
                ]
                ], 204);
            
        } else {

            return response() ->json([
                'type'=>'Product',
                'message'=>'Not Found'
            ],404);

        }
    }
}
