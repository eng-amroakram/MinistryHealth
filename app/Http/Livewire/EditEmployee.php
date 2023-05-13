<?php

namespace App\Http\Livewire;

use App\Http\Controllers\LivewireServices\EmployeeService;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class EditEmployee extends Component
{
    protected $listeners = ["openEditEmployeeModal", "refreshEditEmployee" => '$refresh'];
    use LivewireAlert;

    #parameters
    public $employee_name = "";
    public $employee_number = "";
    public $id_number = "";
    public $job_title = "";
    public $password = "";
    public $employee_id;

    public function render()
    {
        return view('livewire.edit-employee');
    }

    public function openEditEmployeeModal($employee_id)
    {
        $employee = User::find($employee_id);
        if ($employee) {
            $this->employee_id = $employee->id;
            $this->employee_name = $employee->name;
            $this->employee_number = $employee->employee_number;
            $this->id_number = $employee->id_number;
            $this->job_title = $employee->job_title;
        }
    }

    public function openEditEmployeePassword($employee_id)
    {
        $employee = User::find($employee_id);
        if ($employee) {
            $this->employee_id = $employee->id;
            $this->employee_name = $employee->name;
            $this->employee_number = $employee->employee_number;
            $this->id_number = $employee->id_number;
            $this->job_title = $employee->job_title;
        }
    }

    protected function rules()
    {
        return [
            #Form One
            'employee_name' => ['required'],
            'employee_number' => ['required'],
            'id_number' => ['required'],
            'job_title' => ['required'],
            'password' => ['nullable'],
        ];
    }

    protected function messages()
    {
        return [
            #Form One
            'employee_name.required' => 'هذا الحقل مطلوب',
            'employee_number.required' => 'هذا الحقل مطلوب',
            'id_number.required' => 'هذا الحقل مطلوب',
            'job_title.required' => 'هذا الحقل مطلوب',
        ];
    }

    public function edit(EmployeeService $employeeService)
    {
        $data = $this->validate();
        $employeeService->update($data, $this->employee_id);

        $this->alert('success', 'تم تحديث بيانات الموظف بنجاح', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
        ]);

        $this->emit('refreshEmployees');
        $this->emit('refreshEditEmployee');
        $this->password = "";
        $this->emit('submit');
    }
}
