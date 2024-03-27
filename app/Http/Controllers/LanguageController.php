<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
class LanguageController extends Controller
{
    public function languageSwitch(Request $request)
    {

        //$language = $request->input('languageSelect'); 
        $language = $request->locale ?? 'en';
        if (isset($language) && in_array($language, config('app.available_locales'))) {
            session(['language' => $language]);
            App::setLocale($language);
        }else{
            $language = 'en';
        }
        //Log::info("Locale set to: " . $language . " (Selected language: " . $language . ")");
        //app()->setLocale($language);
        return redirect()->back()->with(['language_switched' => $language]);
    }
}
