<?php

namespace App\Http\Controllers;

// use App\Http\Requests\ProductSaveRequest;

use App\Http\Requests\ProductSaveRequest;
use App\Models\Product;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index() 
    {
        return view('product');
    }

    public function detail(Request $request) 
    {
        $data = [
            '_id' => $request->input('id')
        ];
        return view('product-detail', $data);
    }

    public function postProduk(Request $request) 
    {
        // $validated = $request->validate([
        //     'nama_produk' => 'required|min:6'
        // ]);

        $validator = Validator::make($request->all(), [
            'nama_produk' => 'required|min:6',
            'harga' => 'required|numeric',
            'jenis_produk' => 'min:6', 
            'deskripsi' => 'min:10'
        ]);
 
        if ($validator->fails()) {
            $errors = $validator->errors()->getMessages();
            return \response()->json([
                'errors' => $errors
            ]);    
        }        

        $validatedData = $validator->validated();

        $product = Product::create($validatedData);
        $product->save();

        return \response()->json([
            'data' => 'Product has been added'
        ]);    
    }


    public function listProduk() 
    {
        $allProduct = Product::all()->toArray();        

        return \response()->json([
            'data' => $allProduct
        ]);    
    }

    public function detailProduk($id) 
    {
        $product = Product::find($id)->toArray();

        return \response()->json([
            'data' => $product
        ]);    
    }

    public function deleteProduk($id)
    {
        Product::destroy($id);

        return \response()->json([
            'data' => 'Product has been deleted'
        ]);    
    }


    // public function postProduk(ProductSaveRequest $request) 
    // {
        // $validated = $request->validate();

        // if ($request->fails()) {
        //     return \response()->json($request->errors()->getMessages());    
        // }        
        // dump($validated);
    // }
}
