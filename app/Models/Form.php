<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Form extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type'
    ];

    public function questions()
    {
        return $this->hasMany(Question::class, 'form_id', 'id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'form_id', 'id');
    }

    public function solutions()
    {
        return $this->hasMany(Solution::class, 'form_id', 'id');
    }

    public function scopeData($query)
    {
        return $query->select([
            'id', 'name', 'type'
        ]);
    }
}
