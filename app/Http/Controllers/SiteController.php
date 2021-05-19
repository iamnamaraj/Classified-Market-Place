<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;



class SiteController extends Controller
{
public function index() : view
{
    return view('welcome');
}

    public function home() : RedirectResponse
    {
        if(auth()->user()->role =="Admin"){
        return redirect()->route('admin.index');

        }

        return redirect()->route('index');
    }
}
