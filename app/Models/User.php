<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes;


    protected $fillable = [
        'name',
        'employee_number',
        'id_number',
        'job_title',
        'type',
        'password',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];


    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function scopeData($query)
    {
        return $query->select([
            'id',
            'name',
            'employee_number',
            'id_number',
            'job_title',
            'type',
        ]);
    }

    public function scopeFilters(Builder $builder, array $filters = [])
    {
        $filters = array_merge([
            'search' => '',
        ], $filters);

        $builder->when($filters['search'] != '', function ($query) use ($filters) {
            $query
                ->orWhere('name', 'like', '%' . $filters['search'] . '%')
                ->orWhere('employee_number', 'like', '%' . $filters['search'] . '%')
                ->orWhere('id_number', 'like', '%' . $filters['search'] . '%');
        });
    }

    public function forms()
    {
        return $this->hasMany(Form::class, 'user_id', 'id');
    }

    public function answers()
    {
        return $this->hasMany(Answer::class, 'user_id', 'id');
    }

    public function solution()
    {
        return $this->hasMany(Solution::class, 'user_id', 'id');
    }
}
