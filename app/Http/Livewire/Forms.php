<?php

namespace App\Http\Livewire;

use App\Http\Controllers\LivewireServices\FormService;
use App\Models\Form;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\Component;

class Forms extends Component
{
    use LivewireAlert;

    protected $listeners = [
        'refreshCheckboxes' => '$refresh',
        'save' => 'save',
    ];

    private $field = array();
    public $notes = "";
    public $form_type = "monthly_checks";
    public $form_id = 1;

    public function alertComponent($text = 'تم حفظ البيانات بنجاح', $type = 'success')
    {
        $this->alert($type, $text, [
            'position' => 'top-end',
            'timer' => 3000,
            'toast' => true,
            'text' => '',
        ]);

        $this->emit('refreshEmergency');
    }

    public function getForms()
    {
        $forms = Form::data()->where('type', $this->form_type)->get();
        return $forms;
    }

    public function mount($type)
    {
        $this->form_type = $type;
    }

    public function render()
    {
        $forms = $this->getForms();
        return view('livewire.forms', [
            'forms' => $forms
        ]);
    }

    public function save(FormService $formService, $data)
    {
        $data = json_decode(json_encode(json_decode($data)), true);
        $formService->store($data, $this->form_id, $this->notes);
        $this->alertComponent();
        $this->emit("refreshFroms");
        return redirect()->route('web.forms');
    }

    public function changeFormType($type)
    {
        $this->form_type = $type;
    }
}
