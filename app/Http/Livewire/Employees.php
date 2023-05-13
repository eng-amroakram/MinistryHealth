<?php

namespace App\Http\Livewire;

use App\Http\Controllers\LivewireServices\EmployeeService;
use App\Models\User;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;
use Livewire\WithPagination;

class Employees extends Component
{
    #Component Settings
    use LivewireAlert;
    use WithPagination;
    protected $paginationTheme = 'bootstrap';
    protected $listeners = ['refreshEmployees' => '$refresh', 'confirmDelete', 'confirmRestore'];

    #pagination settings
    public $rows = 10;

    #parameters
    public $employee_name = "";
    public $employee_number = "";
    public $id_number = "";
    public $job_title = "";
    public $password = "";
    public $employee_id;
    public $employeeCount = 0;
    #Table Settings
    public $search = "";
    public $filters = [];

    public function getEmployees()
    {
        $this->filters['search'] = $this->search;
        if ($this->search) {
            $this->resetPage();
        }
        $employees = User::data()->filters($this->filters)->where('type', 'employee')->paginate($this->rows);
        return $employees;
    }

    public function getTrashedEmployees()
    {
        $employees = User::data()->onlyTrashed()->where('type', 'employee')->paginate(5);
        return $employees;
    }

    public function render()
    {
        $employees = $this->getEmployees();
        $trashedEmployees = $this->getTrashedEmployees();
        $this->employeeCount =  employeeCount();
        return view('livewire.employees', [
            'employees' => $employees,
            'trashedEmployees' => $trashedEmployees,
        ]);
    }

    protected function rules()
    {
        return [
            #Form One
            'employee_name' => ['required'],
            'employee_number' => ['required', 'unique:users,employee_number'],
            'id_number' => ['required', 'unique:users,id_number'],
            'job_title' => ['required'],
            'password' => ['required']
        ];
    }

    protected function messages()
    {
        return [
            #Form One
            'employee_name.required' => 'هذا الحقل مطلوب',
            'employee_number.required' => 'هذا الحقل مطلوب',
            'employee_number.unique' => 'رقم الموظف موجود بالفعل',
            'id_number.required' => 'هذا الحقل مطلوب',
            'id_number.unique' => 'رقم الهوية موجود بالفعل',
            'job_title.required' => 'هذا الحقل مطلوب',
            'password.required' => 'هذا الحقل مطلوب',
        ];
    }

    public function save(EmployeeService $employeeService)
    {
        $user = User::where('employee_number', $this->employee_number)
                    ->orWhere('id_number', $this->id_number)
                    ->first();

        if ($user) {
            $this->validate([
                'employee_number' => ['unique:users,employee_number'],
                'id_number' => ['unique:users,id_number'],
            ], [
                'employee_number.unique' => 'رقم الموظف موجود بالفعل',
                'id_number.unique' => 'رقم الهوية موجود بالفعل',
            ]);
        }

        $user = User::onlyTrashed()->where('employee_number', $this->employee_number)->first();

        if ($user) {
            $this->employee_id = $user->id;

            $this->alert('error', 'رقم الموظف المدخل موجود في سلة المهملات، هل تريد استرجاعه ؟!', [
                'position' => 'cetner',
                'toast' => true,
                'text' => '',
                'showConfirmButton' => true,
                'confirmButtonText' => 'نعم متأكد',
                'showCancelButton' => true,
                'cancelButtonText' => 'لا',
                'onConfirmed' => 'confirmRestore',
                'allowOutsideClick' => false,
                'timer' => null,
            ]);

            return true;
        }

        $user = User::onlyTrashed()->where('id_number', $this->id_number)->first();

        if ($user) {
            $this->employee_id = $user->id;

            $this->alert('error', 'رقم الهويةالمدخل موجود في سلة المهملات، هل تريد استرجاعه ؟!', [
                'position' => 'cetner',
                'toast' => true,
                'text' => '',
                'showConfirmButton' => true,
                'confirmButtonText' => 'نعم متأكد',
                'showCancelButton' => true,
                'cancelButtonText' => 'لا',
                'onConfirmed' => 'confirmRestore',
                'allowOutsideClick' => false,
                'timer' => null,
            ]);

            return true;
        }

        $data = $this->validate();

        $employeeService->store($data);
        $this->alert('success', 'تم إنشاء الموظف بنجاح', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
        ]);
        $this->emit('refreshEmployees');
        $this->emit('submit');
    }

    public function delete($id)
    {
        $this->employee_id = $id;
        $this->alert('error', 'هل متأكد من عملية الحذف؟', [
            'position' => 'cetner',
            'toast' => true,
            'text' => '',
            'showConfirmButton' => true,
            'confirmButtonText' => 'نعم متأكد',
            'showCancelButton' => true,
            'cancelButtonText' => 'لا',
            'onConfirmed' => 'confirmDelete',
            'allowOutsideClick' => false,
            'timer' => null,
        ]);
        $this->emit('refreshEmployees');
    }

    public function confirmDelete(EmployeeService $employeeService)
    {
        $employeeService->delete($this->employee_id);
        $this->alert('success', 'تم نقل الموظف لسلة المهملات بنجاح', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
        ]);
        $this->emit('refreshEmployees');
    }

    public function restore($id)
    {
        $this->employee_id = $id;
        $this->alert('error', 'هل متأكد من عملية الاسترجاع للموظف؟', [
            'position' => 'cetner',
            'toast' => true,
            'text' => '',
            'showConfirmButton' => true,
            'confirmButtonText' => 'نعم متأكد',
            'showCancelButton' => true,
            'cancelButtonText' => 'لا',
            'onConfirmed' => 'confirmRestore',
            'allowOutsideClick' => false,
            'timer' => null,
        ]);
    }

    public function confirmRestore(EmployeeService $employeeService)
    {
        $employeeService->restore($this->employee_id);
        $this->alert('success', 'تم استرجاع الموظف من سلة المهملات بنجاح', [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
        ]);
        $this->emit('refreshEmployees');
        $this->emit('close');
    }

    public function changePassword($employee_id)
    {
    }
}
