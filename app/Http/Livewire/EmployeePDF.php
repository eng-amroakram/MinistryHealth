<?php

namespace App\Http\Livewire;

use App\Http\Controllers\LivewireServices\PDFService;
use App\Models\Form;
use App\Models\User;
use Livewire\Component;

class EmployeePDF extends Component
{
    public $employee_id;
    public $employee;
    public $answers;
    public $form_id;
    public $forms;
    public $pdf_path;

    public function mount($employee_id)
    {
        $this->employee_id = $employee_id;
        $this->employee = User::find($this->employee_id);
        $this->forms = Form::all();
    }

    public function openForm($id)
    {
        $this->pdf_path = "";

        $answer = $this->answers->where('id', $id)->first();

        $pdfService = new PDFService();
        $name = $pdfService->fillPdf($answer->solutions, $answer->form);

        $path = 'pdf-viewer/web/viewer.html?file=pdfs/' . $name;
        $this->pdf_path = asset($path);
        $this->emit("refreshIframe", $this->pdf_path);
    }

    public function getFormAnswers()
    {
        $user = $this->employee;
        $this->answers = $user->answers;
        return $user->answers->where('form_id', $this->form_id);
    }

    public function render()
    {
        $solutions = $this->getFormAnswers();
        return view('livewire.employee-p-d-f', [
            'solutions' => $solutions
        ]);
    }
}
