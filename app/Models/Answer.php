<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'form_id',
        'solutions',
        'notes'
    ];

    protected $casts = [
        'solutions' => 'array'
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function form()
    {
        return $this->belongsTo(Form::class, 'form_id', 'id');
    }
}
