@extends('parts.web.layout')
@section('content')
    @livewire('forms', ['type' => $type])
@endsection
