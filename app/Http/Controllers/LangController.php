<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LangController extends Controller
{
	public function setLanguage(string $lang): RedirectResponse
	{
		App::setLocale($lang);
		Session::put('locale', $lang);

		return redirect()->back();
	}
}
