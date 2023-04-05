<?php

namespace App\Http\Controllers;

class LangController extends Controller
{
	public function setLanguage($lang)
	{
		session()->put('language', $lang);
		return redirect()->back();
	}
}
