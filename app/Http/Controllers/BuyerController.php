<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Models\Category;
use App\Models\Product;
use App\Models\ParchaseProduct;
use App\Models\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Mail\ProductBuyMail;
use Mail;

class BuyerController extends Controller
{
    public function index() {

        $user = Auth::user();
        $products = Product::where('user_id', '!=', $user->id)->get();
        $categorys = Category::all();
        return view('buyer.buyerindex', compact('products', 'user', 'categorys'));
		
	}

    public function productFilter(Request $request)
    {
        $user = Auth::user();
        if($request->ajax())
        {
        
        $data = Product::where('user_id', '!=', $user->id)->whereBetween('price', array($request->start_price, $request->end_price))
                ->with('users','category')->get();
        
        return Response($data);
        // return Response()->json();
        
        }
    }

    public function categoryFilter(Request $request)
    {
        $user = Auth::user();
        if($request->ajax())
        {
        
        $data = Product::where('user_id', '!=', $user->id)->where('category_id', $request->category_id)
                ->with('users','category')->get();
        
        return Response($data);
        // return Response()->json();
        
        }
    }

    public function productDetail(Request $request) {
        
        $user = Auth::user();
        $id = $request->id;
        $products = Product::where('id', $id)->first();
        $parchaseProduct = ParchaseProduct::where('buyer_id', $user->id)->where('product_id', $id)->first();
        return view('buyer.productdetail', compact('products', 'parchaseProduct', 'user'));
		
	}

    public function parchaseList(Request $request) {
        $user = Auth::user();
        $aceptedParchaseProducts = ParchaseProduct::where('buyer_id', $user->id)->where('is_parchase', '=', '2')->get();

        return view('buyer.parchaselist', compact('aceptedParchaseProducts'));
		
	}

    public function pendingParchaseList(Request $request) {
        $user = Auth::user();
        $aceptedParchaseProducts = ParchaseProduct::where('buyer_id', $user->id)->where('is_parchase', '=', '1')->get();
        // dd($aceptedParchaseProducts);

        return view('buyer.parchaselist', compact('aceptedParchaseProducts'));
		
	}

    public function purchaseProduct(Request $request) {
        dd('in');
        $user = Auth::user();
        $id = $request->id;
        $products = Product::where('id', $id)->first();
        

        ParchaseProduct::create([
            'custom_id' => Str::random(8),
            'buyer_id' => $user->id,
            'seller_id' => $products->user_id ,
            'product_id' => $id,
        ]); 

       
        return redirect('parchaselist');
		
	}

    public function buyNow($id) {
        $user = Auth::user();
        $data = [
            'is_parchase' => '3',
        ];
       
        ParchaseProduct::where('buyer_id', $user->id)->where('product_id', $id)->update($data);

        $user = User::where('id', $user->id)->first();

        $product = Product::where('id', $id)->with('category','users')->first();

        $data = [
            'name' => $product->name,
            'price' => $product->price,
            'category' => $product->category->name,
            'seller' => $product->users->full_name,
        ];

        Mail::to($user->semail)->send(new ProductBuyMail($data));

        // Mail::send('emails/usermail', compact('user'), function ($message) use($user){    
        //     $message->from('fgfg@hff.hdhf');
        //     $message->to($user->email)->subject('Product Buy');

        // });

        return redirect()->back();
		
	}

    public function changeParchaseStatus(Request $request)
    {
       
        $id = $request->id;
        $user = Auth::user();
        $products = Product::find($id);
        

        ParchaseProduct::create([
            'custom_id' => Str::random(8),
            'buyer_id' => $user->id,
            'seller_id' => $products->user_id ,
            'product_id' => $id,
        ]); 
  
        return response()->json();
    }

    public function buyerHistory($id) {
    
        $parchaseProducts = ParchaseProduct::where('buyer_id', $id)->where('is_parchase', '=', '3')->with('product','selleruser')->get();
        // dd($parchaseProducts);
        return view('buyer.buyerhistory', compact('parchaseProducts'));
		
	}

    public function historyFilter(Request $request)
    {
        $user = Auth::user();
        if($request->ajax())
        {
        
        $data = ParchaseProduct::where('buyer_id', $user->id)->where('is_parchase', '=', 'y')
                ->whereBetween('created_at', array($request->from_date, $request->to_date))
                ->with('product','selleruser')->get();
        
        return Response($data);
        // return Response()->json();
        
        }
    }

   
}
