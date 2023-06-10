<div class="table-responsive text-center" style="width: 100%; border-color: rgb(0,0,0);" wire:ignore.self>
    <div class="d-flex justify-content-center">
        <strong>NA:</strong><span style="font-size: large; margin-right: 20px;"> Not Applicable</span>
        <strong>NM:</strong><span style="font-size: large; margin-right: 20px;"> Not Met</span>
        <strong>PM:</strong><span style="font-size: large; margin-right: 20px;"> Partially Met</span>
        <strong>FM:</strong><span style="font-size: large; margin-right: 20px;"> Fully Met</span>
    </div>

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
                            class="checkboxfield {{ $form->name }}_{{ $count }}" name="fm_{{ $count }}"
                            reversone="pm_{{ $count }}" reverstwo="nm_{{ $count }}"
                            reversthree="na_{{ $count }}" form="{{ $form->name }}_{{ $count }}"
                            id="{{ $form->name }}_fm_{{ $count }}" placeholder="">
                        </x-field>

                    </td>

                    <td>

                        <x-field type="checkbox" dir=""
                            class="checkboxfield {{ $form->name }}_{{ $count }}"
                            name="pm_{{ $count }}" reversone="fm_{{ $count }}"
                            reverstwo="nm_{{ $count }}" reversthree="na_{{ $count }}"
                            form="{{ $form->name }}_{{ $count }}"
                            id="{{ $form->name }}_pm_{{ $count }}" placeholder="">
                        </x-field>


                    </td>

                    <td>

                        <x-field type="checkbox" dir=""
                            class="checkboxfield {{ $form->name }}_{{ $count }}"
                            name="nm_{{ $count }}" reversone="fm_{{ $count }}"
                            reverstwo="pm_{{ $count }}" reversthree="na_{{ $count }}"
                            form="{{ $form->name }}_{{ $count }}"
                            id="{{ $form->name }}_nm_{{ $count }}" placeholder="">
                        </x-field>

                    </td>

                    <td>

                        <x-field type="checkbox" dir=""
                            class="checkboxfield {{ $form->name }}_{{ $count }}"
                            name="na_{{ $count }}" reversone="fm_{{ $count }}"
                            reverstwo="pm_{{ $count }}" reversthree="nm_{{ $count }}"
                            form="{{ $form->name }}_{{ $count }}"
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
