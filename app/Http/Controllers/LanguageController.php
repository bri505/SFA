<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function change(Request $request, string $locale)
    {
        if (!in_array($locale, ['es', 'en'])) {
            abort(400);
        }

        session(['locale' => $locale]);

        app()->setLocale($locale);

        return redirect()->back();
    }
}