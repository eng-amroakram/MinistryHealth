<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PanelViewController extends Controller
{
    public function home()
    {
        return view('dashboard.home');
    }

    public function employees()
    {
        return view('dashboard.employees');
    }
}
