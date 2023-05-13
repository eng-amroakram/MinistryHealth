@extends('parts.web.layout')
@section('content')
    <section class="register-photo"
        style="background: rgb(255,255,255);padding: 0px;margin-top: 0px;margin-bottom: 0px;padding-bottom: 0px;">
        <div class="container">
            <section class="register-photo"
                style="background: linear-gradient(167deg, #a6cee6, #75cdbd 100%), rgb(255,255,255);padding: 0px;padding-bottom: 160px;padding-top: 160px;">
                <div class="form-container" style="margin-right: auto;margin-left: auto; box-shadow: 0px 0px 20px 5px;">
                    <div class="image-holder"></div>
                    @livewire('login-form')
                </div>
            </section>
        </div>
    </section>
@endsection
