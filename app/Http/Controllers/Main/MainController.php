<?php

namespace App\Http\Controllers\Main;

use Facade\FlareClient\Http\Response;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home()
    {
        return view('main.index');
    }
    public function about_us()
    {
        return view('main.about');
    }
    public function services()
    {
        return view('main.services');
    }
    public function prices()
    {
        return view('main.price');
    }
    public function faq()
    {
        return view('main.faq');
    }
    public function contact()
    {
        return view('main.contact');
    }
    public function include_mobile_layout(){
        return view('ajax-content.include-mobile-layout');
    }

    public function mainslider_desktop()
    {
        return view('ajax-content.mainslider-desktop');
    }
    public function mainslider_mobile()
    {
        return view('ajax-content.mainslider-mobile');
    }
}
