<?php

namespace App\Http\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;

class LoginForm extends Component
{
    public $employee_number = '';
    public $password = '';
    public $password_error = '';

    public function render()
    {
        return view('livewire.login-form');
    }


    protected function rules()
    {
        return [
            #Form One
            'employee_number' => ['required'],
            'password' => ['required']
        ];
    }

    protected function messages()
    {
        return [
            #Form One
            'employee_number.required' => 'هذا الحقل مطلوب',
            'password.required' => 'هذا الحقل مطلوب',
        ];
    }


    public function login()
    {
        $data = $this->validate();

        $user = User::where('employee_number', $data['employee_number'])->first();
        if ($user) {
            $check = Hash::check($data['password'], $user->password);
            if ($check) {
                Auth::login($user);
                $this->password_error = '';
                return redirect()->route('home');
            }

            $this->password_error = "كلمة المرور خاطئة";
        }
    }

    public function updated($field, $value)
    {
        if ($field == 'password') {
            $this->password_error = '';
        }
    }
}
