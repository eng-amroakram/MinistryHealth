<h3 style="text-align: right;">{{ __($form->name) }}</h3>

@php
    $counter = 1;
@endphp
@foreach ([0, 1, 2, 3] as $max)
    @if ($max != 0)
        <div>
            <h6 style="text-align: right;">:رئيس القسم</h6>

            <x-field type="text" dir="rtl" class="textfield" name="head_department_{{ $max }}"
                form="{{ $form->name }}" id="{{ $form->name }}_head_department_{{ $max }}"
                placeholder="رئيس القسم">
            </x-field>
        </div>
    @endif

    <div style="width: 100%;" wire:ignore.self>
        <div class="table-responsive text-center" style="width: 100%; border-color: rgb(0,0,0);" wire:ignore.self>
            <table class="table table-bordered" wire:ignore.self>
                <thead>
                    <tr>
                        @foreach ($colmuns as $colmun)
                            <th class="table-success">{{ $colmun }}</th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>

                    @php
                        $count = 1;
                    @endphp

                    @while ($count < 4)
                        <tr>
                            <td>
                                <x-field type="text" dir="rtl" class="textfield"
                                    name="work_order_number_{{ $count }}" form="{{ $form->name }}"
                                    id="{{ $form->name }}_work_order_number_{{ $count }}" placeholder="">
                                </x-field>
                            </td>

                            <td>
                                <x-field type="text" dir="rtl" class="textfield"
                                    name="location_{{ $count }}" form="{{ $form->name }}"
                                    id="{{ $form->name }}_location_{{ $count }}" placeholder="">
                                </x-field>
                            </td>

                            <td>
                                <x-field type="text" dir="rtl" class="textfield"
                                    name="comment_{{ $count }}" form="{{ $form->name }}"
                                    id="{{ $form->name }}_comment_{{ $count }}" placeholder="">
                                </x-field>
                            </td>
                            <td>{{ $count }}</td>
                        </tr>

                        @php
                            $count = $count + 1;
                            $counter = $counter + 1;
                        @endphp
                    @endwhile
                </tbody>
            </table>
        </div>
    </div>
@endforeach

<div class="row mb-3">

    <div class="col-md-6">
        <h6 style="text-align: right;">:مراقب السلامة</h6>
        <x-field type="text" dir="rtl" class="textfield" name="safety_monitor" form="{{ $form->name }}"
            id="{{ $form->name }}_safety_monitor" placeholder="">
        </x-field>

    </div>

    <div class="col-md-6">
        <h6 style="text-align: right;">:رئيس قسم السلامة</h6>
        <x-field type="text" dir="rtl" class="textfield" name="head_safety_department"
            form="{{ $form->name }}" id="{{ $form->name }}_head_safety_department" placeholder="">
        </x-field>

    </div>
</div>
