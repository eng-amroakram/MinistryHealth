<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ViewController extends Controller
{
    public function home()
    {
        return view('web.home');
    }

    public function login()
    {
        return view('web.auth.login');
    }

    public function forms($type = "monthly_checks")
    {
        return view('web.forms', ["type" => $type]);
    }

    public function employeeForms($employee_id)
    {
        return view('dashboard.employee-pdf', [
            'employee_id' => $employee_id
        ]);
    }

    public function logout()
    {
        $user = auth()->user();
        if ($user) {
            Auth::logout($user);
            return redirect()->route('home');
        }
    }
}
