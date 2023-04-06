<?php

namespace App\Http\Controllers;

class LangController extends Controller
{
	public function setLanguage($lang)
	{
		if ($lang === 'en' | $lang === 'ka')
		{
			session()->put('language', $lang);
			return redirect()->back();
		}
		else
		{
			abort(404);
		}
	}
}
