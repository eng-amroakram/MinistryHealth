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
            @while ($count < 18)
                <tr>
                    <td>
                        <x-field type="text" dir="rtl" class="textfield" name="comment_{{ $count }}"
                            form="{{ $form->name }}" id="{{ $form->name }}_comment_{{ $count }}"
                            placeholder="">
                        </x-field>
                    </td>

                    <td>
                        <x-field type="checkbox" dir="" id="{{ $form->name }}_un_{{ $count }}"
                            name="un_{{ $count }}" form="{{ $form->name }}_{{ $count }}"
                            revers="sat_{{ $count }}"
                            class="checkboxfield {{ $form->name }}_{{ $count }}" placeholder="">
                        </x-field>
                    </td>

                    <td>
                        <x-field type="checkbox" dir="" id="{{ $form->name }}_sat_{{ $count }}"
                            form="{{ $form->name }}_{{ $count }}" revers="un_{{ $count }}"
                            name="sat_{{ $count }}"
                            class="checkboxfield {{ $form->name }}_{{ $count }}" placeholder="">
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
