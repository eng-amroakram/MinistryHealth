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
            @foreach ($form->questions as $question)
                <tr>
                    <td>{{ $count }}</td>
                    <td id="tdstyleleft">{{ $question->question }}</td>

                    <td>
                        <x-field type="text" dir="rtl" class="textfield" name="comment_{{ $count }}"
                            form="{{ $form->name }}" id="{{ $form->name }}_comment_{{ $count }}"
                            placeholder="">
                        </x-field>
                    </td>

                    <td>
                        <x-field type="checkbox" dir=""
                            class="checkboxfield {{ $form->name }}_{{ $count }}"
                            name="_un_{{ $count }}" revers="sat_{{ $count }}"
                            form="{{ $form->name }}_{{ $count }}"
                            id="{{ $form->name }}_un_{{ $count }}" placeholder="">
                        </x-field>
                    </td>

                    <td>
                        <x-field type="checkbox" dir=""
                            class="checkboxfield {{ $form->name }}_{{ $count }}"
                            name="_sat_{{ $count }}" revers="un_{{ $count }}"
                            form="{{ $form->name }}_{{ $count }}"
                            id="{{ $form->name }}_sat_{{ $count }}" placeholder="">
                        </x-field>
                    </td>

                    <td id="tdstyleright">{{ __("$question->question") }}</td>
                    <td>{{ $count }}</td>
                </tr>
                @php
                    $count = $count + 1;
                @endphp
            @endforeach
        </tbody>
    </table>
</div>
