<?php

namespace App\Http\Controllers\LivewireServices;

use App\Http\Controllers\Controller;
use App\Models\Answer;
use App\Models\User;

class FormService extends Controller
{
    public function store($solution, $form_id, $notes)
    {
        $user = User::find(auth()->id());

        $solution['name_ar'] = $user->name;
        $solution['inspector_name'] = $user->name;
        $solution['signature_image'] = $user->signature;
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

