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
            @while ($count < 19)
                <tr>
                    <td>
                        <x-field type="text" dir="rtl" class="textfield" name="notes_{{ $count }}"
                            form="{{ $form->name }}" id="{{ $form->name }}_notes_{{ $count }}" placeholder="">
                        </x-field>
                    </td>

                    <td>
                        <x-field type="text" dir="rtl" class="textfield" name="door_{{ $count }}"
                            form="{{ $form->name }}" id="{{ $form->name }}_door_{{ $count }}" placeholder="">
                        </x-field>
                    </td>

                    <td>
                        <x-field type="text" dir="rtl" class="textfield" name="box_{{ $count }}"
                            form="{{ $form->name }}" id="{{ $form->name }}_box_{{ $count }}"
                            placeholder="">
                        </x-field>
                    </td>

                    <td>
                        <x-field type="text" dir="rtl" class="textfield" name="knob_{{ $count }}"
                            form="{{ $form->name }}" id="{{ $form->name }}_knob_{{ $count }}"
                            placeholder="">
                        </x-field>
                    </td>

                    <td>
                        <x-field type="text" dir="rtl" class="textfield" name="clear_{{ $count }}"
                            form="{{ $form->name }}" id="{{ $form->name }}_clear_{{ $count }}"
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
