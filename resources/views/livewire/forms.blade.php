<section class="register-photo" style="background: rgb(255,255,255);padding: 0px;">

    <style>
        #divblure {
            filter: blur(5px);
            pointer-events: none;
        }

        .divblure {
            filter: blur(5px);
            pointer-events: none;
        }

        #loading {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #divh1 {
            position: absolute;
            background-color: #28b596;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }

        #colora {
            background: rgba(255, 255, 255, 0);
            color: rgb(255, 255, 255);
            font-weight: bold;
        }

        #stylea {
            text-align: center;
        }

        #widht {
            width: 80%;
        }

        #buttonstyle {
            width: 15%;
            float: left;
            background: linear-gradient(94deg, #008bdc 0%, rgb(0, 195, 185) 23%, #00735b 100%);
        }

        .ulstyle {
            background: linear-gradient(94deg, #008bdc 0%, rgb(0, 195, 185) 23%, #00735b 100%);
        }
    </style>

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
                @endphp

                @foreach ($forms as $form)
                    <x-tab :colmuns="config('forms.filesconfig.columns.' . $form->name) ?? []" :form="$form" :count="1" :stat="$stat"></x-tab>

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

    @push('employee_script')
        <script>
            $(document).ready(function() {

                var $formid = $(".changetab").attr('formid');
                console.log($formid);
                @this.set("form_id", $formid)
                checkbox = $(".checkbox");
                tab = $(".changetab");
                var $textfields = [];
                var $values = [];
                var $comments = [];
                var $mix = [];

                checkbox.on('change', function() {
                    $box = $(this);
                    $value = $box.attr("checkboxvalue");
                    $type = $box.attr("checkboxtype");
                    $check = $box.is(':checked');
                    $form = $box.attr("form");

                    function setCheckbox($form_name) {

                        if (!($values[$value] === undefined)) {
                            $che = "#" + $form_name + "_" + $values[$value];
                            console.log($che);
                            $($che).prop('checked', false);
                            $($che).prop('checked', false);
                            delete $values[$value];
                        }

                        if ($check) {
                            $values[$value] = $type + "_" + $value;
                        } else {
                            delete $values[$value];
                        }

                        $comments[0] = $values;
                        return $values
                    }

                    $result = setCheckbox($form);
                    console.log($result);

                });

                $(".inputdata").on('input', function() {
                    $box = $(this);
                    $type = $box.attr("typefield");
                    $count = $box.attr("count");
                    $value = $box.val();

                    if ($value) {
                        $textfields[$type] = $value;
                    } else {
                        $textfields[$type] = $value;
                    }

                    console.log($textfields);
                });

                Livewire.on("refreshFroms", function() {
                    $('.checkbox').prop('checked', false);
                    $('.inputdata').val("");
                    $('.comments').val("");
                    $('.comments_location').val("");

                    $values = [];
                    $textfields = [];
                    $comments = [];
                    $mix = [];
                });

                $(".save").on('click', function() {
                    $button = $(this).attr("buttontype");

                    function getContent($data) {
                        $data['location'] = $textfields['location'];
                        $data['building'] = $textfields['building'];
                        var $object = Object.assign({}, $data);
                        var $json = JSON.stringify($object);
                        return $json;
                    }

                    if ($button == "surface_inspection") {
                        var $var = getContent($values);
                        Livewire.emit('save', $var);
                    }

                    if ($button == "external_warehouses") {
                        var $var = getContent($values);
                        Livewire.emit('save', $var);
                    }

                    if ($button == "kitchen_inspection") {
                        var $var = getContent($values);
                        Livewire.emit('save', $var);
                    }

                    if ($button == "staircase") {
                        var $var = getContent($values);
                        Livewire.emit('save', $var);
                    }

                    if ($button == "glass_breaker_fire_detectors") {
                        var $var = getContent($values);
                        Livewire.emit('save', $var);
                    }

                    if ($button == "CO2") {
                        var $var = getContent($comments);
                        Livewire.emit('saveco2', $var);
                    }

                    if ($button == "FM200") {
                        var $data = getContent($comments);
                        Livewire.emit('savefm200', $data);
                    }

                    if ($button == "emergency_exits") {
                        var $data = getContent($textfields);
                        Livewire.emit('emergency_exits', $data);
                    }

                    if ($button == "fire_blankets") {
                        var $data = getContent($comments);
                        Livewire.emit('fire_blankets', $data);
                    }

                    if ($button == "fire_hoses") {
                        var $data = getContent($comments);
                        Livewire.emit('fire_hoses', $data);
                    }

                    if ($button == "emergency_headlamps") {
                        var $data = getContent($comments);
                        Livewire.emit('emergency_headlamps', $data);
                    }

                    if ($button == "elevator_inspection") {
                        var $data = getContent($textfields);
                        Livewire.emit('elevator_inspection', $data);
                    }

                    if ($button == "emergency_shower_eye_wash") {
                        var $data = getContent($comments);
                        Livewire.emit('emergency_shower_eye_wash', $data);
                    }

                    if ($button == "daily_notes") {
                        var $data = getContent($textfields);
                        Livewire.emit('daily_notes', $data);
                    }

                    if ($button == "direct_status_report") {
                        var $data = getContent($textfields);
                        Livewire.emit('direct_status_report', $data);
                    }

                    if ($button == "night_inspection_tour") {
                        var $data = getContent($textfields);
                        Livewire.emit('night_inspection_tour', $data);
                    }

                    if ($button == "fire_sprinklers") {
                        var $json = getContent($textfields);
                        Livewire.emit('fire_sprinklers', $json);
                    }

                    if ($button == "fire_extinguishers") {
                        var $json = getContent($comments);
                        Livewire.emit('fire_extinguishers', $json);
                    }

                });

                tab.on("click", function() {
                    $('.checkbox').prop('checked', false);
                    $('.inputdata').val("");
                    $('.comments').val("");
                    $('.comments_location').val("");
                    $values = [];
                    $textfields = [];
                    $comments = [];
                    $mix = [];
                });

                $(".comments").on("input", function() {
                    $box = $(this);
                    $value = $box.val();
                    $type = $box.attr("typefield");
                    $question_1 = $box.attr("count");

                    if ($value) {
                        $comments[$type] = $value;
                    } else {
                        $comments[$type] = $value;
                    }
                    console.log($comments);
                });

                $(".comments_location").on("input", function() {
                    $box = $(this);
                    $value = $box.val();
                    $type = $box.attr("typefield");
                    $question_1 = $box.attr("count");

                    if ($value) {
                        $comments[$type] = $value;
                        $mix[1] = $comments;
                    } else {
                        $comments[$type] = $value;
                    }
                });

                $(".changetab").on("click", function() {
                    var $formid = $(this).attr('formid');
                    @this.set("form_id", $formid)
                });

                $(".checkboxv2").on("click", function() {
                    $box = $(this);
                    $value = $box.attr("checkboxvalue");
                    $type = $box.attr("checkboxtype");
                    $check = $box.is(':checked');
                    $form = $box.attr("form");

                    var $enter = $type + "_" + $value;

                    if ($check) {
                        $comments[$enter] = "✔️";
                    } else {
                        $comments[$enter] = "❌";
                    }
                    console.log($comments);
                });



            });
        </script>
    @endpush


</section>
