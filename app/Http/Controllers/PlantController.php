<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Invoice;
use App\Models\Plant;

use App\Models\Customer;
use App\Models\Order;

class PlantController extends Controller {
    // public function __construct(){
    // 	$this->middleware('auth');
    // }

    public function store(Request $request){

    	$data=new Plant;

        $data->code=$request->code;
        $data->place=$request->place;
        $data->variety=$request->variety;
        $data->lot=$request->lot;
        $data->is_certified=$request->has('is_certified');
        $data->quantity=$request->quantity;
        $data->transplanting_date=$request->transplanting_date;
        $data->omv=$request->omv;

        //$data->plant_code=$request->code;
    	//$data->name= $request->name;
        //$data->category = $request->category;
    	//$data->stock = $request->stock;
    	//$data->unit_price = $request->unit_price;
    	// $data->total_price = $request->stock * $request->unit_price;
        //$data->sales_unit_price = $request->sale_price;
        // $data->sales_stock_price =$request->stock * $request->sale_price;


        $data->save();
        return Redirect()->route('all.plant');
    }


    public function delete($id)
    {
        $plant =  Plant::find($id);
        if($plant->delete())
        {

            return redirect()->back()->with(['msg' => 1]);
        }
        else
        {
            return redirect()->back()->with(['msg' => 2]);
        }

    }


    public function allPlant(){
    	$plants = Plant::all();
    	return view('Admin.all_plant',compact('plants'));
    }

    public function availablePlants(){
        $plants = Plant::where('stock','>','0')->get();
        return view('Admin.available_plants',compact('plants'));
    }

    public function countPlants(){
        return view('dashboard',['allPlantCountVar'=>count(Plant::all()),'certifiedPlantCountVar'=>count(Plant::where('is_certified',true)->get())]);
    }


    public function formData($id){
        $plant = Plant::find($id);

        return view('Admin.add_order',compact('plant'));
        // return view('Admin.add_order',['plant'=>$plant]);
    }

    public function purchaseData($id){
        $plant = Plant::find($id);

        return view('Admin.purchase_plants',compact('plant'));
    }

    public function storePurchase(Request $request){

        Plant::where('name',$request->name)->update(['stock' => $request->stock + $request->purchase]);

        return Redirect()->route('all.plant');
    }


}
