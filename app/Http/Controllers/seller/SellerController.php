<?php

namespace App\Http\Controllers\seller;

use Illuminate\Http\Request;
use DB;
use Auth;
use Session;
use App\Models\Category;
use App\Models\Product;
use App\Models\ParchaseProduct;
use App\Http\Controllers\Controller;

class SellerController extends Controller
{
     
    public function index() {
            $user = Auth::user();
            return view('seller.sellerindex', compact('user'));
		
	}

    public function search(Request $request)
        {
            $user = Auth::user();
            if($request->ajax())
            {
            $output="";
            $products = Product::where('user_id', $user->id)->where('name','LIKE','%'.$request->search."%")->get();
  
            if($products)
            {
            foreach ($products as $key =>$product) {
                // dd($product);
            $output.='<tr>'.
            '<td>'.$product->id.'</td>'.
            '<td>'.$product->name.'</td>'.
            '<td>'.$product->price.'</td>'.
            '<td>'.$product->category->name.'</td>'.
            '<td><a class="btn btn-info btn-sm" href="'.url('/productview', ['id' => $product->id]).'">view</a>
            </td>'.
            '</tr>';
            }
            // dd($output);
            return Response($output);
               }
            }
               
    }

    public function selledHistory() {
        $user = Auth::user();
        $productHistorys = ParchaseProduct::where('seller_id', '=', $user->id)->where('is_parchase', '=', '3')->with('product','buyeruser')->get();
        
        return view('seller.sellerhistory', compact('productHistorys'));
		
	}

    public function aceptedRequestHistory() {
        $user = Auth::user();
        $productHistorys = ParchaseProduct::where('seller_id', '=', $user->id)->where('is_parchase', '=', '2')->with('product','buyeruser')->get();
        
        return view('seller.sellerhistory', compact('productHistorys'));
		
	}
}
