<?php



namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;
use App\Models\Invoice;
use App\Models\Plant;

use App\Models\Customer;
use App\Models\Order;

class PlantController extends Controller
{
    // public function __construct(){
    // 	$this->middleware('auth');
    // }

    public function store(Request $request)
    {

        $data = new Plant;

        $data->code = $request->code;
        $data->place = $request->place;
        $data->variety = $request->variety;
        $data->lot = $request->lot;
        $data->is_certified = $request->has('is_certified');
        $data->quantity = $request->quantity;
        $data->transplanting_date = $request->transplanting_date;
        $data->omv = $request->omv;

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


    public function delete(Request $request)
    {
        $code = $request->ids;
        Plant::whereIn('code',explode(",",$code))->delete();
        return response()->json(['status'=>true,'message'=>"Plant successfully removed."]);
    }

    

    public function allPlant()
    {
        $plants = Plant::all();
        return view('Admin.all_plant', compact('plants'));
    }

    public function availablePlants()
    {
        $plants = Plant::where('stock', '>', '0')->get();
        return view('Admin.available_plants', compact('plants'));
    }

    public function countPlants()
    {
        return view('dashboard', ['allPlantCountVar' => count(Plant::all()), 'certifiedPlantCountVar' => count(Plant::where('is_certified', true)->get())]);
    }


    public function export()
    {
        $plants = Plant::all();
        $csvFileName = 'plants.csv';
        $headers = [
            'Content-Type' => 'text/csv',
            'Content-Disposition' => 'attachment; filename="' . $csvFileName . '"',
        ];

        $handle = fopen('php://output', 'w');
        fputcsv($handle, ['code','place','variety','lot','is_certified','quantity','transplanting_date','omv']); // Add more headers as needed

        foreach ($plants as $plant) {
            fputcsv($handle, [$plant->code, $plant->place,$plant->variety,$plant->lot, $plant->is_certified, $plant->quantity, $plant->transplanting_date, $plant->omv]); // Add more fields as needed
        }

        fclose($handle);

        return Response::make('', 200, $headers);
    }

    public function import(Request $request)
    {
        $file = $request->file('file');
        $fileContents = file($file->getPathname());
        $i = 0;
        foreach ($fileContents as $line) {
            $data = str_getcsv($line);
            

            if( $i > 0){
            Plant::create([
                'code' => $data[0],
                'place' => $data[1],
                'variety' => $data[2],
                'lot' => $data[3],
                'is_certified' => $data[4],
                'quantity' => $data[5],
                'transplanting_date' => $data[6],
                'omv' => $data[7]
                // Add more fields as needed
            ]);}
            $i++;
        }

        return redirect()->back()->with('success', 'CSV file imported successfully.');
    }



    public function formData($id)
    {
        $plant = Plant::find($id);

        return view('Admin.add_order', compact('plant'));
        // return view('Admin.add_order',['plant'=>$plant]);
    }

    public function plantDetails($id)
    {
        $plant = Plant::find($id);

        return view('Admin.plant_details', compact('plant'));
    }

    public function storePurchase(Request $request)
    {

        Plant::where('name', $request->name)->update(['stock' => $request->stock + $request->purchase]);

        return Redirect()->route('all.plant');
    }
}
