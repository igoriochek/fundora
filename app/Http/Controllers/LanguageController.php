<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Symfony\Component\HttpKernel\Exception\HttpException;

class LanguageController extends Controller
{
    public function change(string|null $locale): RedirectResponse
    {
        try {
            if (!in_array($locale, config('app.available_locales'))) {
                throw new HttpException(400, __('messages.errorInvalidLanguage'));
            }
            session()->put('locale', $locale);
            return back();
        } catch (HttpException $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
