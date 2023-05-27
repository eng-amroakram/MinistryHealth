<?php

namespace App\Http\Controllers\LivewireServices;

use App\Http\Controllers\Controller;
use App\Models\Answer;

class FormService extends Controller
{
    public function store($solution, $form_id, $notes)
    {
        $user = auth()->user();
        $solution['name_ar'] = $user->name;
        $solution['inspector_name'] = $user->name;
        $solution['date'] = now()->format('Y-m-d');

        Answer::create([
            'user_id' => $user->id,
            'form_id' => $form_id,
            'solutions' => $solution,
            'notes' => $notes
        ]);

        return true;
    }
}
