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
            @while ($count < 13)

                <tr>
                    <td>
                        <select class="selectfield" form="{{ $form->name }}" name="weight_{{ $count }}"
                            id="{{ $form->name }}_weight_{{ $count }}" id="weight_{{ $count }}">
                            <option value="">لا شيء</option>
                            <option value="✔️">✔️</option>
                            <option value="❌">❌</option>
                        </select>
                    </td>

                    <td>
                        <select class="selectfield" form="{{ $form->name }}" name="pressure_{{ $count }}"
                            id="{{ $form->name }}_pressure_{{ $count }}" id="pressure_{{ $count }}">
                            <option value="">لا شيء</option>
                            <option value="✔️">✔️</option>
                            <option value="❌">❌</option>
                        </select>
                    </td>

                    <td>
                        <select class="selectfield" form="{{ $form->name }}" name="gauge_{{ $count }}"
                            id="{{ $form->name }}_gauge_{{ $count }}" id="gauge_{{ $count }}">
                            <option value="">لا شيء</option>
                            <option value="✔️">✔️</option>
                            <option value="❌">❌</option>
                        </select>
                    </td>

                    <td>
                        <select class="selectfield" form="{{ $form->name }}" name="hose_{{ $count }}"
                            id="{{ $form->name }}_hose_{{ $count }}" id="hose_{{ $count }}">
                            <option value="">لا شيء</option>
                            <option value="✔️">✔️</option>
                            <option value="❌">❌</option>
                        </select>
                    </td>

                    <td>
                        <select class="selectfield" form="{{ $form->name }}" name="pin_{{ $count }}"
                            id="{{ $form->name }}_pin_{{ $count }}" id="pin_{{ $count }}">
                            <option value="">لا شيء</option>
                            <option value="✔️">✔️</option>
                            <option value="❌">❌</option>
                        </select>
                    </td>

                    <td>
                        <select class="selectfield" form="{{ $form->name }}" name="cylinder_{{ $count }}"
                            id="{{ $form->name }}_cylinder_{{ $count }}" id="cylinder_{{ $count }}">
                            <option value="">لا شيء</option>
                            <option value="✔️">✔️</option>
                            <option value="❌">❌</option>
                        </select>
                    </td>

                    <td>
                        <select class="selectfield" form="{{ $form->name }}" name="cabinet_{{ $count }}"
                            id="{{ $form->name }}_cabinet_{{ $count }}" id="cabinet_{{ $count }}">
                            <option value="">لا شيء</option>
                            <option value="✔️">✔️</option>
                            <option value="❌">❌</option>
                        </select>
                    </td>

                    <td>
                        <select class="selectfield" form="{{ $form->name }}" name="bracket_{{ $count }}"
                            id="{{ $form->name }}_bracket_{{ $count }}" id="bracket_{{ $count }}">
                            <option value="">لا شيء</option>
                            <option value="✔️">✔️</option>
                            <option value="❌">❌</option>
                        </select>
                    </td>

                    <td>
                        <select class="selectfield" form="{{ $form->name }}" name="capacity_{{ $count }}"
                            id="{{ $form->name }}_capacity_{{ $count }}" id="capacity_{{ $count }}">
                            <option value="6 Kg">6 Kg</option>
                            <option value="4 Kg">4 Kg</option>
                            <option value="2 Kg">2 Kg</option>
                        </select>
                    </td>

                    <td>
                        <select class="selectfield" form="{{ $form->name }}" name="type_{{ $count }}"
                            id="{{ $form->name }}_type_{{ $count }}" id="type_{{ $count }}">
                            <option value="co2">co2</option>
                            <option value="بودره">بودره</option>
                            <option value="زيتية">زيتية</option>
                        </select>
                    </td>

                    <td>
                        <x-field type="text" dir="rtl" class="textfield" name="location_{{ $count }}"
                            form="{{ $form->name }}" id="{{ $form->name }}_location_{{ $count }}"
                            placeholder="">
                        </x-field>
                    </td>

                    <td>
                        <x-field type="text" dir="rtl" class="textfield"
                            name="extinguisher_{{ $count }}" form="{{ $form->name }}"
                            id="{{ $form->name }}_extinguisher_{{ $count }}" placeholder="">
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
