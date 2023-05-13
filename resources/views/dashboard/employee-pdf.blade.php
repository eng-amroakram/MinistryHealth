@extends('parts.dashboard.layout')
@section('content')
    @livewire('employee-p-d-f', ['employee_id' => $employee_id])
@endsection
