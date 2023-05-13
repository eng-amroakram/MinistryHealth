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
        'ememergenc' => "saveEmemergenc",
        'fires' => "saveFires",
        'blankets' => "saveBlankets",
        'eyedashes' => "saveEyeDash",
        "saveco2" => "saveCo2",
        "savefm200" => "saveFM200",
        "emergency_exits" => "emergencyExits",
        "fire_blankets" => "fireBlankets",
        "fire_hoses" => "fireHoses",
        "emergency_headlamps" => "emergencyHeadlamps",
        "elevator_inspection" => "elevatorInspection",
        "emergency_shower_eye_wash" => "emergencyShowerEyeWash",
        "daily_notes" => "dailyNotes",
        "direct_status_report" => "directStatusReport",
        "night_inspection_tour" => "nightInspectionTour",
        "fire_sprinklers" => "fireSprinklers",
        "fire_extinguishers" => "fireExtinguishers"
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

    public function changeFormType($type)
    {
        $this->form_type = $type;
    }

    public function saveCo2(FormService $formService, $data)
    {
        $data = json_decode(json_encode(json_decode($data)), true);
        $data = array_filter($data);
        $checkboxes =  array_fill_keys(array_values($data[0]), "✓");
        unset($data[0]);
        $fields = $data;
        $data = array_merge($fields, $checkboxes);
        dd($data);
        $formService->store($data, $this->form_id, $this->notes);
        $this->alertComponent();
        $this->emit("refreshFroms");
    }

    public function saveFM200(FormService $formService, $data)
    {
        $data = json_decode(json_encode(json_decode($data)), true);
        $data = array_filter($data);
        $checkboxes =  array_fill_keys(array_values($data[0]), "✓");
        unset($data[0]);
        $fields = $data;
        $data = array_merge($fields, $checkboxes);
        $formService->store($data, $this->form_id, $this->notes);
        $this->alertComponent();
        $this->emit("refreshFroms");
    }

    public function emergencyShowerEyeWash(FormService $formService, $data)
    {
        $checkboxes = [];
        $data = json_decode(json_encode(json_decode($data)), true);
        $data = array_filter($data);
        if (array_key_exists(0, $data)) {
            $checkboxes = array_filter($data[0]);
            $checkboxes =  array_fill_keys(array_values($data[0]), "✓");
            unset($data[0]);
        }
        $data = array_merge($data, $checkboxes);
        $formService->store($data, $this->form_id, $this->notes);
        $this->alertComponent();
        $this->emit("refreshFroms");
    }

    public function fireBlankets(FormService $formService, $data)
    {
        $checkboxes = [];
        $data = json_decode(json_encode(json_decode($data)), true);
        $data = array_filter($data);
        if (array_key_exists(0, $data)) {
            $checkboxes = array_filter($data[0]);
            $checkboxes =  array_fill_keys(array_values($data[0]), "✓");
            unset($data[0]);
        }
        $data = array_merge($data, $checkboxes);
        $formService->store($data, $this->form_id, $this->notes);
        $this->alertComponent();
        $this->emit("refreshFroms");
    }

    public function fireHoses(FormService $formService, $data)
    {
        $checkboxes = [];
        $data = json_decode(json_encode(json_decode($data)), true);
        $data = array_filter($data);
        if (array_key_exists(0, $data)) {
            $checkboxes = array_filter($data[0]);
            $checkboxes =  array_fill_keys(array_values($data[0]), "✓");
            unset($data[0]);
        }
        $data = array_merge($data, $checkboxes);
        $formService->store($data, $this->form_id, $this->notes);
        $this->alertComponent();
        $this->emit("refreshFroms");
    }

    public function emergencyHeadlamps(FormService $formService, $data)
    {
        $checkboxes = [];
        $data = json_decode(json_encode(json_decode($data)), true);
        $data = array_filter($data);
        if (array_key_exists(0, $data)) {
            $checkboxes = array_filter($data[0]);
            $checkboxes =  array_fill_keys(array_values($data[0]), "✓");
            unset($data[0]);
        }
        $data = array_merge($data, $checkboxes);
        $formService->store($data, $this->form_id, $this->notes);
        $this->alertComponent();
        $this->emit("refreshFroms");
    }

    public function elevatorInspection(FormService $formService, $data)
    {
        $data = json_decode(json_encode(json_decode($data)), true);
        $data = array_filter($data);
        $formService->store($data, $this->form_id, $this->notes);
        $this->alertComponent();
        $this->emit("refreshFroms");
    }

    public function fireSprinklers(FormService $formService, $data)
    {
        $data = json_decode(json_encode(json_decode($data)), true);
        $data = array_filter($data);
        $formService->store($data, $this->form_id, $this->notes);
        $this->alertComponent();
        $this->emit("refreshFroms");
    }

    public function emergencyExits(FormService $formService, $data)
    {
        $data = json_decode(json_encode(json_decode($data)), true);
        $data = array_filter($data);
        $formService->store($data, $this->form_id, $this->notes);
        $this->alertComponent();
        $this->emit("refreshFroms");
    }

    public function dailyNotes(FormService $formService, $data)
    {
        $data = json_decode(json_encode(json_decode($data)), true);
        $data = array_filter($data);
        $formService->store($data, $this->form_id, $this->notes);
        $this->alertComponent();
        $this->emit("refreshFroms");
    }

    public function directStatusReport(FormService $formService, $data)
    {
        $data = json_decode(json_encode(json_decode($data)), true);
        $data = array_filter($data);
        $formService->store($data, $this->form_id, $this->notes);
        $this->alertComponent();
        $this->emit("refreshFroms");
    }

    public function nightInspectionTour(FormService $formService, $data)
    {
        $data = json_decode(json_encode(json_decode($data)), true);
        $data = array_filter($data);
        $formService->store($data, $this->form_id, $this->notes);
        $this->alertComponent();
        $this->emit("refreshFroms");
    }


    public function save(FormService $formService, $data)
    {
        $data = json_decode(json_encode(json_decode($data)), true);
        $data = array_filter($data);
        $location = '';
        $building = '';
        if (array_key_exists('location', $data)) {
            $location = $data['location'];
        }

        if (array_key_exists('building', $data)) {
            $building = $data['building'];
        }

        $checkboxes =  array_fill_keys(array_values($data), "✓");
        $checkboxes['location'] = $location;
        $checkboxes['building'] = $building;
        $formService->store($checkboxes, $this->form_id, $this->notes);
        $this->alertComponent();
        $this->emit("refreshFroms");
    }

    public function fireExtinguishers(FormService $formService, $data)
    {
        $data = json_decode(json_encode(json_decode($data)), true);
        $data = array_filter($data);


        // $forms = ["bracket", "cabinet", "cylinder", "pin", "hose", "gauge", "pressure"];


        // $count = 1;
        // while ($count < 13) {
        //     foreach ($forms as $form) {
        //         $field = $form . "_" . $count;

        //         if (!array_key_exists($field, $data)) {
        //             $data[$field] = "❌";
        //         }
        //     }
        //     $count = $count + 1;
        // }

        $formService->store($data, $this->form_id, $this->notes);
        $this->alertComponent();
        $this->emit("refreshFroms");
    }
}
