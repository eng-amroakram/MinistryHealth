<div class="table-responsive text-center" style="width: 100%; border-color: rgb(0,0,0);" wire:ignore.self>
    <h3 style="text-align: right;">{{ __($form->name) }}</h3>
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

            @while ($count < 12)
                <tr>
                    <td>
                        <x-field type="text" dir="rtl" class="textfield"
                            name="lift_operation_condition_{{ $count }}" form="{{ $form->name }}"
                            id="{{ $form->name }}_lift_operation_condition_{{ $count }}" placeholder="">
                        </x-field>

                    </td>

                    <td>
                        <x-field type="text" dir="rtl" class="textfield" name="tel_{{ $count }}"
                            form="{{ $form->name }}" id="{{ $form->name }}_tel_{{ $count }}" placeholder="">
                        </x-field>
                    </td>

                    <td>
                        <x-field type="text" dir="rtl" class="textfield" name="battery_{{ $count }}"
                            form="{{ $form->name }}" id="{{ $form->name }}_battery_{{ $count }}"
                            placeholder="">
                        </x-field>
                    </td>

                    <td>
                        <x-field type="text" dir="rtl" class="textfield"
                            name="ventilation_system_{{ $count }}" form="{{ $form->name }}"
                            id="{{ $form->name }}_ventilation_system_{{ $count }}" placeholder="">
                        </x-field>
                    </td>

                    <td>
                        <x-field type="text" dir="rtl" class="textfield"
                            name="internal_light_{{ $count }}" form="{{ $form->name }}"
                            id="{{ $form->name }}_internal_light_{{ $count }}" placeholder="">
                        </x-field>
                    </td>

                    <td>
                        <x-field type="text" dir="rtl" class="textfield" name="lift_room_{{ $count }}"
                            form="{{ $form->name }}" id="{{ $form->name }}_lift_room_{{ $count }}"
                            placeholder="">
                        </x-field>
                    </td>

                    <td>
                        <x-field type="text" dir="rtl" class="textfield"
                            name="door_condition_{{ $count }}" form="{{ $form->name }}"
                            id="{{ $form->name }}_door_condition_{{ $count }}" placeholder="">
                        </x-field>
                    </td>

                    <td>
                        <x-field type="text" dir="rtl" class="textfield"
                            name="open_floor_level_{{ $count }}" form="{{ $form->name }}"
                            id="{{ $form->name }}_open_floor_level_{{ $count }}" placeholder="">
                        </x-field>
                    </td>

                    <td>
                        <x-field type="text" dir="rtl" class="textfield" name="alarm_{{ $count }}"
                            form="{{ $form->name }}" id="{{ $form->name }}_alarm_{{ $count }}"
                            placeholder="">
                        </x-field>
                    </td>

                    <td>
                        <x-field type="text" dir="rtl" class="textfield" name="location_{{ $count }}"
                            form="{{ $form->name }}" id="{{ $form->name }}_location_{{ $count }}"
                            placeholder="">
                        </x-field>
                    </td>

                    <td>{{ $count }}</td>
                </tr>

                @php
                    $count = $count + 1;
                @endphp
            @endwhile

        </tbody>
    </table>
</div>
