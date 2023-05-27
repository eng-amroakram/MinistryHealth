@foreach ($eyewash as $count => $data_form)
    <div style="width: 100%;" wire:ignore.self>
        <div class="table-responsive text-center" style="width: 100%; border-color: rgb(0,0,0);" wire:ignore.self>

            <h3 style="text-align: right;">{{ $data_form[1] }}</h3>

            <table class="table table-bordered" wire:ignore.self>
                <thead>
                    <tr>
                        @foreach (config('forms.filesconfig.columns.' . $form->name) ?? [] as $colmun)
                            <th class="table-success">{{ $colmun }}</th>
                        @endforeach
                    </tr>
                </thead>

                <tbody>

                    @if (in_array($form->name, ['emergency_shower_eye_wash']))
                        @while ($count < $data_form[0])
                            <tr>
                                <td>
                                    <x-field type="text" dir="rtl" class="textfield"
                                        name="comment_{{ $count }}" form="{{ $form->name }}"
                                        id="{{ $form->name }}_comment_{{ $count }}" placeholder="">
                                    </x-field>
                                </td>

                                <td>
                                    <x-field type="checkbox" dir=""
                                        id="{{ $form->name }}_un_{{ $count }}" name="un_{{ $count }}"
                                        form="{{ $form->name }}_{{ $count }}"
                                        revers="sat_{{ $count }}"
                                        class="checkboxfield {{ $form->name }}_{{ $count }}" placeholder="">
                                    </x-field>
                                </td>

                                <td>
                                    <x-field type="checkbox" dir=""
                                        id="{{ $form->name }}_sat_{{ $count }}"
                                        form="{{ $form->name }}_{{ $count }}"
                                        revers="un_{{ $count }}" name="sat_{{ $count }}"
                                        class="checkboxfield {{ $form->name }}_{{ $count }}" placeholder="">
                                    </x-field>
                                </td>

                                <td>
                                    <x-field type="text" dir="rtl" class="textfield"
                                        name="location_{{ $count }}" form="{{ $form->name }}"
                                        id="{{ $form->name }}_comment_{{ $count }}" placeholder="">
                                    </x-field>
                                </td>
                                <td>{{ $count }}</td>
                            </tr>

                            @php
                                $count = $count + 1;
                            @endphp
                        @endwhile
                    @endif

                </tbody>
            </table>

        </div>

    </div>
@endforeach
