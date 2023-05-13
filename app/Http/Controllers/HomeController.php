<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $user = auth()->user();
        if ($user) {
            if ($user->type == 'admin') {
                return redirect()->route('panel.home');
            }
            if ($user->type == 'superadmin') {
                return redirect()->route('panel.home');
            }

            if ($user->type == 'employee') {
                return redirect()->route('web.forms');
            }
        }

        return redirect()->route('web.home');
    }
}
