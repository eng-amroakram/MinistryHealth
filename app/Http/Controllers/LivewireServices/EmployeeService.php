<?php

namespace App\Http\Controllers\LivewireServices;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class EmployeeService extends Controller
{
    public function store($data)
    {
        $employee = User::create([
            'name' => $data['employee_name'],
            'employee_number' => $data['employee_number'],
            'id_number' => $data['id_number'],
            'job_title' => $data['job_title'],
            'type' => 'employee',
            'password' => Hash::make($data['password']),
        ]);

        return $employee;
    }

    public function update($data, $id)
    {
        $employee = User::find($id);
        if ($data['password']) {
            $employee->update([
                "name" => $data['employee_name'],
                "employee_number" => $data['employee_number'],
                "id_number" => $data['id_number'],
                "job_title" => $data['job_title'],
                "password" => Hash::make($data['password'])
            ]);
        } else {
            $employee->update([
                "name" => $data['employee_name'],
                "employee_number" => $data['employee_number'],
                "id_number" => $data['id_number'],
                "job_title" => $data['job_title'],
            ]);
        }
        return true;
    }

    public function delete($id)
    {
        $employee = User::find($id);
        $employee->delete();
    }

    public function restore($id)
    {
        $employee = User::onlyTrashed()->find($id);
        $employee->restore();
    }
}
