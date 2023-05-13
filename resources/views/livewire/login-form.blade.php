<form wire:submit.prevent="login" style="background: linear-gradient(130deg, #4c934f, #a2c8ca);">

    <h2 class="text-center" style="color: rgb(255,255,255);">
        <strong>تسجيل الدخول</strong>
    </h2>

    <div class="mb-3" style="text-align: right;">
        <input class="form-control" type="text" dir="rtl" wire:model="employee_number" placeholder="رقم الموظف">
        @error('employee_number')
            <small class="text-danger" style="font-size: 0.7rem; font-weight: bold;">{{ $message }}</small>
        @enderror
    </div>

    <div class="mb-3" style="text-align: right;">
        <input class="form-control" type="password" dir="rtl" wire:model="password" placeholder="كلمة السر">
        @error('password')
            <small class="text-danger" style="font-size: 0.7rem; font-weight: bold;">{{ $message }}</small>
        @enderror
        @if ($password_error)
            <small class="text-danger" style="font-size: 0.7rem; font-weight: bold;">{{ $password_error }}</small>
        @endif

    </div>
    <div class="mb-3">

    </div>

    <div class="mb-3">
        <div class="form-check"><label class="form-check-label" style="color: rgb(255,255,255);">
                <input class="form-check-input" type="checkbox">remember me</label>
        </div>
    </div>

    <div class="mb-3">
        <button class="btn btn-primary d-block w-100" type="submit"
            style="background: linear-gradient(143deg, #30678e, #28917a);">دخول</button>
    </div>
</form>
