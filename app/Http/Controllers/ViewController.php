<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

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

    public function signature()
    {
        return view('web.signature');
    }

    public function signatureUpload(Request $request)
    {
        $user = User::find(auth()->id());

        if (!file_exists(public_path('upload'))) {
            mkdir(public_path('upload'), 0777, true);
        }

        $folderPath = public_path('upload/');
        $image_parts = explode(";base64,", $request->signed);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
        $path = uniqid() . '.' . $image_type;
        $file = $folderPath . $path;

        file_put_contents($file, $image_base64);
        $user->signature = $path;
        $user->save();

        return redirect()->route('home');
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
