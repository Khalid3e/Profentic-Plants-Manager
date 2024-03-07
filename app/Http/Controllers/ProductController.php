<?php

namespace App\Http\Controllers;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;
use App\Models\Invoice;
use App\Models\Product;
use App\Models\Customer;
use App\Models\Order;

class ProductController extends Controller
{
    // public function __construct(){
    // 	$this->middleware('auth');
    // }

    public function store(Request $request){

    	$data=new Product;
        $data->product_code=$request->code;
    	$data->name= $request->name;
        $data->category = $request->category;
    	$data->stock = $request->stock;
    	$data->unit_price = $request->unit_price;
    	// $data->total_price = $request->stock * $request->unit_price;
        $data->sales_unit_price = $request->sale_price;
        // $data->sales_stock_price =$request->stock * $request->sale_price;


        $data->save();
        return Redirect()->route('add.product');
    }


    public function delete($id)
    {
        $product =  Product::find($id);
        if($product->delete())
        {

            return redirect()->back()->with(['msg' => 1]);
        }
        else
        {
            return redirect()->back()->with(['msg' => 2]);
        }

    }


    public function allProduct(){
    	$products = Product::all();
    	return view('Admin.all_product',compact('products'));
    }

    public function availableProducts(){
        $products = Product::where('stock','>','0')->get();
        return view('Admin.available_products',compact('products'));
    }

    public function countProducts(){
        return view('dashboard',['allProductCountVar'=>count(Product::all()),'availableProductCountVar'=>count(Product::where('stock','>','0')->get()),'soldProductsCountVar'=>count(Invoice::select('product_name', Invoice::raw("SUM(quantity) as count"))->groupBy(Invoice::raw("product_name"))->get()), 'countPendingOrdersVar'=>count(Order::where('order_status','=','0')->get())]);
    }


    public function formData($id){
        $product = Product::find($id);

        return view('Admin.add_order',compact('product'));
        // return view('Admin.add_order',['product'=>$product]);
    }

    public function purchaseData($id){
        $product = Product::find($id);

        return view('Admin.purchase_products',compact('product'));
    }

    public function storePurchase(Request $request){

        Product::where('name',$request->name)->update(['stock' => $request->stock + $request->purchase]);

        return Redirect()->route('all.product');
    }


}
