<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class LanguageController extends Controller
{
    public function languageSwitch(Request $request)
    {
        $language = $request->input('languageSelect'); 
        session(['language' => $language]);
        //Log::info("Locale set to: " . $language . " (Selected language: " . $language . ")");
        //app()->setLocale($language);
        App::setLocale($language);
        return redirect()->back()->with(['language_switched' => $language]);
    }
}
