<?php

namespace App\Http\Controllers\seller;

use App\Http\Controllers\Controller;
use App\Http\Requests\ProductRequest;
use App\Models\Product;
use App\Models\ParchaseProduct;
use App\Models\Category;
use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
     
            $user = Auth::user();
            $products = Product::where('user_id', $user->id)->get();
            return view('seller.product.list', compact('products'));
            
     
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorys = Category::get(['id', 'name']);
        return view('seller.product.create', compact('categorys'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ProductRequest $request)
    {
        $user = Auth::user();
        //add image
        $path = NULL;
		if ($request->has('image')) {
			$path = $request->file('image')->store('product');
		}
		

        // dd($request->all());
		$product = Product::create([
            'custom_id' => Str::random(8),
            'name' => $request->name,
            'price' => $request->price,
            'user_id' => $user->id,
            'category_id' => $request->category_id,
            'image' => $path,
        ]);

        

        $product->save();

        return redirect('productlist');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $products = Product::where('id', (int)$id)->first();
        $parchaseProducts = ParchaseProduct::where('product_id', $id)->where('is_parchase', '=', '1')->get();
        // dd($parchaseProducts);
        return view('seller.product.view', compact('products','parchaseProducts'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categorys = Category::get(['id', 'name']);
        $product = Product::where('id', $id)->first();
        return view('seller.product.edit', compact('categorys', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(ProductRequest $request)
    {
        $id = $request->id;
        $user = Auth::user();
        $product = Product::where('id', $id)->first();

        $old_image_path = $product->image;

        // Add Banner image
		if ($request->has('image')) {
			$path = NULL;
			Storage::delete($old_image_path);
			$path = $request->file('image')->store('product');
		}
        else{
            $path = $old_image_path;
        }

        $productData = array(
            'name' => $request->name,
            'price' => $request->price,
            'user_id' => $user->id,
            'category_id' => $request->category_id,
            'image' => $path,
        );

        Product::where('id', $id)->update($productData);
        return redirect('productlist');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id)->first();
               
		if ($product) {
            if ($product->image != '') {
				Storage::delete($product->image);
			}
			$product->delete();
        }
        return redirect('productlist');
    }

    public function aceptRequest($id) {
       
        $data = [
            'is_parchase' => '2',
        ];
       
        ParchaseProduct::where('id', $id)->update($data);
        
        return redirect()->back();
		
	}
}
