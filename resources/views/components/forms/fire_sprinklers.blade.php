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
                    <td id="tdstylecenter">{{ $question->question }}</td>
                    <td>
                        <select class="selectfield" form="{{ $form->name }}"
                            id="{{ $form->name }}_status_{{ $count }}"name="status_{{ $count }}"
                            id="status_{{ $count }}">
                            <option value="">لا شيء</option>
                            <option value="جيد">جيد</option>
                            <option value="غير جيد">غير جيد</option>
                        </select>

                    </td>
                    <td id="tdstylecenter">{{ __("$question->question") }}</td>
                    <td>{{ $count }}</td>
                </tr>
                @php
                    $count = $count + 1;
                @endphp
            @endforeach
        </tbody>
    </table>
</div>
