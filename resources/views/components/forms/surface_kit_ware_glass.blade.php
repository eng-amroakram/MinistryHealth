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
                        <x-field type="checkbox" dir=""
                            class="checkboxfield {{ $form->name }}_{{ $count }}" name="yes_{{ $count }}"
                            reversone="no_{{ $count }}" reverstwo="na_{{ $count }}"
                            form="{{ $form->name }}_{{ $count }}"
                            id="{{ $form->name }}_yes_{{ $count }}" placeholder="">
                        </x-field>
                    </td>

                    <td>
                        <x-field type="checkbox" dir=""
                            class="checkboxfield {{ $form->name }}_{{ $count }}"
                            name="no_{{ $count }}" reversone="yes_{{ $count }}"
                            reverstwo="na_{{ $count }}" form="{{ $form->name }}_{{ $count }}"
                            id="{{ $form->name }}_no_{{ $count }}" placeholder="">
                        </x-field>
                    </td>

                    <td>
                        <x-field type="checkbox" dir=""
                            class="checkboxfield {{ $form->name }}_{{ $count }}"
                            name="na_{{ $count }}" reversone="yes_{{ $count }}"
                            reverstwo="no_{{ $count }}" form="{{ $form->name }}_{{ $count }}"
                            id="{{ $form->name }}_na_{{ $count }}" placeholder="">
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
