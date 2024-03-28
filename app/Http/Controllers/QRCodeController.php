<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class QRCodeController extends Controller
{
    public function genenrateQR(Request $request) 
    {
        $data = $request->locale;

        return redirect()->back()->with('barcode', [
            'QRCode' => $data
        ]);
    }
}
