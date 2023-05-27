<section class="register-photo" style="background: rgb(255,255,255);padding: 0px;">

    <div class="container" style="margin-top: 20px; margin-bottom: 20px;" wire:ignore.self>

        <section class="register-photo"
            style="background: linear-gradient(167deg, #00629f, #019e81 100%), rgb(255,255,255);padding-bottom: 0px;padding-top: 0px;">
            <nav class="navbar navbar-light navbar-expand-lg navigation-clean" style="background: rgb(0,154,137);">
                <div class="container">
                    <button class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#navcol-1">
                        <span class="visually-hidden">Toggle navigation</span><span
                            class="navbar-toggler-icon"></span></button>

                    <div id="navcol-1" class="collapse navbar-collapse">
                        <ul class="navbar-nav ms-auto">

                            <li class="nav-item daily_tours" style="margin-right: 7px;">
                                <a class="nav-link "
                                    href="{{ route('web.forms', ['type' => 'daily_tours']) }}#daily_tours"
                                    style="font-weight: bold;color: rgb(0,0,0);background: #66c857;">
                                    الجولات اليومية
                                </a>
                            </li>

                            <li class="nav-item annual_tours">
                                <a class="nav-link "
                                    href="{{ route('web.forms', ['type' => 'annual_tours']) }}#annual_tours"
                                    style="font-weight: bold;color: rgb(0,0,0);background: #66c857;margin-right: 7px;">
                                    الجولات السنوية
                                </a>
                            </li>

                            <li class="nav-item monthly_complaints">
                                <a class="nav-link "
                                    href="{{ route('web.forms', ['type' => 'monthly_checks']) }}#monthly_checks"
                                    style="font-weight: bold;color: rgb(0,0,0);background: #66c857;">
                                    التشيكات الشهرية
                                </a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
        </section>

        <div id="loading" wire:loading>
            <div class="d-flex justify-content-center">
                <div class="spinner-border text-success" style="width: 3rem; height: 3rem;" role="status">
                    <span class="visually-hidden">Loading...</span>
                </div>
            </div>
            <h3> ... يرجى الانتظار قليلا</h3>
        </div>

        <div class="text-end" wire:loading.class.add="divblure" wire:ignore.self>

            <ul class="nav nav-tabs justify-content-lg-end ulstyle" role="tablist" wire:ignore.self>
                @foreach ($forms as $form)
                    <li class="nav-item {{ $form->name }}" role="presentation" wire:ignore.self>
                        <a class="nav-link changetab" role="tab" data-bs-toggle="tab" href="#{{ $form->name }}"
                            id="colora" formid="{{ $form->id }}" wire:ignore.self>
                            {{ __("$form->name") }}
                        </a>
                    </li>
                @endforeach
            </ul>

            <div class="tab-content tabsdiv" wire:ignore.self>
                @php
                    $stat = 0;
                    $eye_wash = [
                        '1' => ['7', 'دش الطوارئ', 'emergency_shower'],
                        '7' => ['13', 'غسيل العيون', 'eye_wash'],
                    ];
                @endphp

                @foreach ($forms as $form)
                    <div class="tab-pane fade @if ($stat == 0) show active @endif  justify-content-lg-end {{ 'div' . $form->name }} "
                        role="tabpanel" id="{{ $form->name }}" style="padding: 30px;" wire:ignore.self>

                        <div class="row mb-3">
                            <div class="col-md-6">
                                <h6 style="text-align: right;">:الموقع</h6>
                                <x-field type="text" dir="rtl" class="textfield w-100" name="location"
                                    form="{{ $form->name }}" placeholder="ادخل الموقع" id=""> </x-field>
                            </div>

                            <div class="col-md-6">
                                <h6 style="text-align: right;">:المبنى</h6>
                                <x-field type="text" dir="rtl" class="textfield w-100" name="building"
                                    form="{{ $form->name }}" placeholder="ادخل المبنى" id=""> </x-field>
                            </div>
                        </div>

                        @if ($form->name == 'emergency_shower_eye_wash')
                            <x-forms.emergency_shower_eye_wash :form="$form" :eyewash="$eye_wash">
                            </x-forms.emergency_shower_eye_wash>
                        @endif

                        @if (in_array($form->name, [
                                'surface_inspection',
                                'kitchen_inspection',
                                'external_warehouses',
                                'glass_breaker_fire_detectors',
                                'boilers',
                                'generators',
                                'refrigerants',
                            ]))
                            <x-forms.surface_kit_ware_glass :colmuns="config('forms.filesconfig.columns.' . $form->name) ?? []" :form="$form">
                            </x-forms.surface_kit_ware_glass>
                        @endif

                        @if (in_array($form->name, ['warehouse']))
                            <x-forms.warehouse :colmuns="config('forms.filesconfig.columns.' . $form->name) ?? []" :form="$form">
                            </x-forms.warehouse>
                        @endif

                        @if (in_array($form->name, ['staircase']))
                            <x-forms.stairecase :colmuns="config('forms.filesconfig.columns.' . $form->name) ?? []" :form="$form">
                            </x-forms.stairecase>
                        @endif

                        @if (in_array($form->name, ['CO2', 'FM200']))
                            <x-forms.co2_fm200 :colmuns="config('forms.filesconfig.columns.' . $form->name) ?? []" :form="$form">
                            </x-forms.co2_fm200>
                        @endif

                        @if (in_array($form->name, ['night_inspection_tour']))
                            <x-forms.night_inspection_tour :colmuns="config('forms.filesconfig.columns.' . $form->name) ?? []" :form="$form">
                            </x-forms.night_inspection_tour>
                        @endif

                        @if (in_array($form->name, ['fire_sprinklers']))
                            <x-forms.fire_sprinklers :colmuns="config('forms.filesconfig.columns.' . $form->name) ?? []" :form="$form">
                            </x-forms.fire_sprinklers>
                        @endif

                        @if (in_array($form->name, ['emergency_exits']))
                            <x-forms.emergency_exits :colmuns="config('forms.filesconfig.columns.' . $form->name) ?? []" :form="$form">
                            </x-forms.emergency_exits>
                        @endif

                        @if (in_array($form->name, ['fire_blankets']))
                            <x-forms.fire_blankets :colmuns="config('forms.filesconfig.columns.' . $form->name) ?? []" :form="$form">
                            </x-forms.fire_blankets>
                        @endif

                        @if (in_array($form->name, ['fire_hoses']))
                            <x-forms.fire_hoses :colmuns="config('forms.filesconfig.columns.' . $form->name) ?? []" :form="$form">
                            </x-forms.fire_hoses>
                        @endif

                        @if (in_array($form->name, ['emergency_headlamps']))
                            <x-forms.emergency_headlamps :colmuns="config('forms.filesconfig.columns.' . $form->name) ?? []" :form="$form">
                            </x-forms.emergency_headlamps>
                        @endif

                        @if (in_array($form->name, ['elevator_inspection']))
                            <x-forms.elevator_inspection :colmuns="config('forms.filesconfig.columns.' . $form->name) ?? []" :form="$form">
                            </x-forms.elevator_inspection>
                        @endif

                        @if (in_array($form->name, ['fire_extinguishers']))
                            <x-forms.fire_extinguishers :colmuns="config('forms.filesconfig.columns.' . $form->name) ?? []" :form="$form">
                            </x-forms.fire_extinguishers>
                        @endif

                        @if (in_array($form->name, ['direct_status_report']))
                            <x-forms.direct_status_report :colmuns="config('forms.filesconfig.columns.' . $form->name) ?? []" :form="$form">
                            </x-forms.direct_status_report>
                        @endif

                        @if (in_array($form->name, ['daily_notes']))
                            <x-forms.daily_notes :colmuns="config('forms.filesconfig.columns.' . $form->name) ?? []" :form="$form">
                            </x-forms.daily_notes>
                        @endif

                        <div>
                            <h6 style="text-align: right;">:الملاحظات</h6>
                            <textarea style="width: 100%;" dir="rtl" class="textfield" name="notes" id="{{ $form->name }}_notes"
                                rows="3" placeholder="ادخل الحالة"></textarea>
                        </div>

                        <div>
                            <x-button type="button" class="btn btn-success save" :buttontype="$form->name" id="buttonstyle"
                                namebutton="حفظ البيانات"></x-button>
                        </div>

                    </div>
                    @php
                        $stat = 1;
                    @endphp
                @endforeach

                @if (!$forms->count())
                    <h2 id="stylea" class="soon" wire:ignore.self>{{ '... قريبا' }}</h2>
                @endif

            </div>
        </div>
    </div>


    {{-- <x-tab :colmuns="config('forms.filesconfig.columns.' . $form->name) ?? []" :form="$form" :count="1" :stat="$stat"></x-tab> --}}
    @push('employee_script')
        <script>
            $(document).ready(function() {
                var $data = [];
                var $tab = $(".changetab");
                var $textfield = $(".textfield");
                var $checkboxfield = $(".checkboxfield");
                var $selectfield = $(".selectfield");
                var $save = $(".save");

                function getContent() {
                    var $object = Object.assign({}, $data);
                    return JSON.stringify($object);
                }

                $checkboxfield.on('change', function() {
                    //Init
                    var $user_action = $(this);
                    var $index = $data.indexOf($user_action.attr('name'));
                    var $checked = $user_action.is(':checked');
                    var $form_id = "." + $user_action.attr("form");

                    //Reset
                    $($form_id).prop('checked', false);
                    delete $data[$user_action.attr('revers')];
                    delete $data[$user_action.attr('reversone')];
                    delete $data[$user_action.attr('reverstwo')];
                    delete $data[$user_action.attr('reversthree')];


                    //Print
                    console.log($user_action.attr('reversone'));
                    console.log($user_action.attr('reverstwo'));


                    //Process
                    if ($checked) {
                        $user_action.prop('checked', true);
                        $data[$user_action.attr('name')] = "✓";
                    } else {
                        delete $data[$user_action.attr('name')];
                        $user_action.prop('checked', false);
                    }

                });

                $textfield.on('input', function() {
                    var $user_action = $(this);
                    var $index = $data.indexOf($user_action.attr('name'));

                    if ($user_action.val()) {
                        $data[$user_action.attr('name')] = $user_action.val();
                    } else {
                        delete $data[$user_action.attr('name')];
                    }
                });

                $selectfield.on('change', function() {
                    var $user_action = $(this);
                    var $index = $data.indexOf($user_action.attr('name'));

                    if ($user_action.val()) {
                        $data[$user_action.attr('name')] = $user_action.val();
                    } else {
                        delete $data[$user_action.attr('name')];
                    }

                });

                $save.on('click', function() {
                    Livewire.emit('save', getContent());
                    $data = [];
                    $checkboxfield.prop('checked', false);
                    $textfield.val("");
                });

                $tab.on("click", function() {
                    var $formid = $(this).attr('formid');
                    $data = [];
                    $checkboxfield.prop('checked', false);
                    $textfield.val("");
                    @this.set("form_id", $formid)
                });
            });
        </script>
    @endpush


</section>
