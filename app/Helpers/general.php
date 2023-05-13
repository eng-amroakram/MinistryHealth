<?php

use App\Models\User;

if (!function_exists('employeeCount')) {
    function employeeCount()
    {
        $employees = User::where('type', 'employee')->get();
        return $employees->count();
    }
}
