<div class="tab-pane fade @if ($stat == 0) show active @endif  justify-content-lg-end {{ 'div' . $form->name }} "
    role="tabpanel" id="{{ $form->name }}" style="padding: 30px;" wire:ignore.self>















    @if (!in_array($form->name, ['daily_notes', 'emergency_shower_eye_wash']))

        <div style="width: 100%;" wire:ignore.self>

            @if (!in_array($form->name, ['direct_status_report', 'daily_notes', 'night_inspection_tour', 'fire_extinguishers']))
                <div class="row mb-3">
                    <div class="col-md-6">
                        <h6 style="text-align: right;">:الموقع</h6>
                        <input type="text" dir="rtl" class="inputdata w-100" typefield="location"
                            name="location" id="location" placeholder="ادخل الموقع" />
                    </div>

                    <div class="col-md-6">
                        <h6 style="text-align: right;">:المبنى</h6>
                        <input dir="rtl" class="inputdata w-100" typefield="building" name="building"
                            id="building" placeholder="ادخل المبنى" />
                    </div>
                </div>
            @endif



















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

                            @if (in_array($form->name, [
                                    'surface_inspection',
                                    'kitchen_inspection',
                                    'external_warehouses',
                                    'glass_breaker_fire_detectors',
                                ]))
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td id="tdstyleleft">{{ $question->question }}</td>

                                    <td>
                                        <input type="checkbox" class="checkbox" form="{{ $form->name }}"
                                            id="{{ $form->name }}_yes_{{ $count }}" checkboxtype="yes"
                                            checkboxvalue="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="checkbox" class="checkbox" form="{{ $form->name }}"
                                            id="{{ $form->name }}_no_{{ $count }}" checkboxtype="no"
                                            checkboxvalue="{{ $count }}">
                                    </td>
                                    <td>
                                        <input type="checkbox" class="checkbox" form="{{ $form->name }}"
                                            id="{{ $form->name }}_na_{{ $count }}" checkboxtype="na"
                                            checkboxvalue="{{ $count }}">
                                    </td>
                                    <td id="tdstyleright">{{ __("$question->question") }}</td>
                                    <td>{{ $count }}</td>
                                </tr>
                            @endif

                            @if (in_array($form->name, ['staircase']))
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td id="tdstyleleft">{{ $question->question }}</td>

                                    <td>
                                        <input type="checkbox" class="checkbox" form="{{ $form->name }}"
                                            id="{{ $form->name }}_fm_{{ $count }}" checkboxtype="fm"
                                            checkboxvalue="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="checkbox" class="checkbox" form="{{ $form->name }}"
                                            id="{{ $form->name }}_pm_{{ $count }}" checkboxtype="pm"
                                            checkboxvalue="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="checkbox" class="checkbox" form="{{ $form->name }}"
                                            id="{{ $form->name }}_nm_{{ $count }}" checkboxtype="nm"
                                            checkboxvalue="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="checkbox" class="checkbox" form="{{ $form->name }}"
                                            id="{{ $form->name }}_na_{{ $count }}" checkboxtype="na"
                                            checkboxvalue="{{ $count }}">
                                    </td>

                                    <td id="tdstyleright">{{ __("$question->question") }}</td>
                                    <td>{{ $count }}</td>
                                </tr>
                            @endif





                            @if (in_array($form->name, ['CO2', 'FM200']))
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td id="tdstyleleft">{{ $question->question }}</td>

                                    <td>
                                        <input type="text" dir="rtl" class="comments"
                                            typefield="comment_{{ $count }}" id="widht"
                                            question="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="checkbox" class="checkbox" form="{{ $form->name }}"
                                            id="{{ $form->name }}_un_{{ $count }}" checkboxtype="un"
                                            checkboxvalue="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="checkbox" class="checkbox" form="{{ $form->name }}"
                                            id="{{ $form->name }}_sat_{{ $count }}" checkboxtype="sat"
                                            checkboxvalue="{{ $count }}">
                                    </td>

                                    <td id="tdstyleright">{{ __("$question->question") }}</td>
                                    <td>{{ $count }}</td>
                                </tr>
                            @endif




                            @if (in_array($form->name, ['night_inspection_tour']))
                                <tr>
                                    <td>
                                        <input type="text" dir="rtl" class="inputdata"
                                            typefield="comment_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="text" dir="rtl" class="inputdata"
                                            typefield="work_number_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>

                                    <td>
                                        <select class="inputdata" typefield="status_{{ $count }}"
                                            id="status_{{ $count }}">
                                            <option value="">لا شيء</option>
                                            <option value="يوجد">يوجد</option>
                                            <option value="لا يوجد">لا يوجد</option>
                                        </select>
                                    </td>

                                    <td id="tdstylecenter">{{ __("$question->question") }}</td>
                                    <td>{{ $count }}</td>
                                </tr>
                            @endif

                            @if (in_array($form->name, ['fire_sprinklers']))
                                <tr>
                                    <td>{{ $count }}</td>
                                    <td id="tdstylecenter">{{ $question->question }}</td>
                                    {{-- <td>{{ 'Monthly' }}</td> --}}
                                    <td>
                                        <select class="inputdata" typefield="status_{{ $count }}"
                                            id="status_{{ $count }}">
                                            <option value="">لا شيء</option>
                                            <option value="يوجد">يوجد</option>
                                            <option value="لا يوجد">لا يوجد</option>
                                        </select>
                                    </td>
                                    <td id="tdstylecenter">{{ __("$question->question") }}</td>
                                    <td>{{ $count }}</td>
                                </tr>
                            @endif

                            @php
                                $count = $count + 1;
                            @endphp
                        @endforeach











                        @if (in_array($form->name, ['emergency_exits']))
                            @while ($count < 19)
                                <tr>
                                    <td>
                                        <input type="text" dir="rtl" class="inputdata"
                                            typefield="notes_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="text" dir="rtl" class="inputdata"
                                            typefield="door_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="text" dir="rtl" class="inputdata"
                                            typefield="box_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>
                                    <td>
                                        <input type="text" dir="rtl" class="inputdata"
                                            typefield="knob_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="text" dir="rtl" class="inputdata"
                                            typefield="clear_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="text" dir="rtl" class="inputdata"
                                            typefield="location_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>
                                    <td>{{ $count }}</td>
                                </tr>
                                @php
                                    $count = $count + 1;
                                @endphp
                            @endwhile

                        @endif

                        @if (in_array($form->name, ['fire_blankets']))
                            @while ($count < 18)
                                <tr>
                                    <td>
                                        <input type="text" dir="rtl" class="comments"
                                            typefield="comment_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="checkbox" class="checkbox" form="{{ $form->name }}"
                                            id="{{ $form->name }}_un_{{ $count }}" checkboxtype="un"
                                            checkboxvalue="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="checkbox" class="checkbox" form="{{ $form->name }}"
                                            id="{{ $form->name }}_sat_{{ $count }}" checkboxtype="sat"
                                            checkboxvalue="{{ $count }}">
                                    </td>


                                    <td>
                                        <input type="text" dir="rtl" class="comments"
                                            typefield="location_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>
                                    <td>{{ $count }}</td>
                                </tr>

                                @php
                                    $count = $count + 1;
                                @endphp
                            @endwhile
                        @endif

                        @if (in_array($form->name, ['fire_hoses']))
                            @while ($count < 15)
                                <tr>
                                    <td>
                                        <input type="text" dir="rtl" class="comments"
                                            typefield="comment_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="checkbox" class="checkbox" form="{{ $form->name }}"
                                            id="{{ $form->name }}_un_{{ $count }}" checkboxtype="un"
                                            checkboxvalue="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="checkbox" class="checkbox" form="{{ $form->name }}"
                                            id="{{ $form->name }}_sat_{{ $count }}" checkboxtype="sat"
                                            checkboxvalue="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="text" dir="rtl" class="comments"
                                            typefield="location_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>
                                    <td>{{ $count }}</td>
                                </tr>

                                @php
                                    $count = $count + 1;
                                @endphp
                            @endwhile

                        @endif

                        @if (in_array($form->name, ['emergency_headlamps']))
                            @while ($count < 17)
                                <tr>
                                    <td>
                                        <input type="text" dir="rtl" class="comments"
                                            typefield="comment_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="checkbox" class="checkbox" form="{{ $form->name }}"
                                            id="{{ $form->name }}_un_{{ $count }}" checkboxtype="un"
                                            checkboxvalue="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="checkbox" class="checkbox" form="{{ $form->name }}"
                                            id="{{ $form->name }}_sat_{{ $count }}" checkboxtype="sat"
                                            checkboxvalue="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="text" dir="rtl" class="comments"
                                            typefield="location_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>
                                    <td>{{ $count }}</td>
                                </tr>

                                @php
                                    $count = $count + 1;
                                @endphp
                            @endwhile
                        @endif

                        @if (in_array($form->name, ['elevator_inspection']))
                            @while ($count < 12)
                                <tr>
                                    <td>
                                        <input type="text" dir="rtl" class="inputdata"
                                            typefield="lift_operation_condition_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="text" dir="rtl" class="inputdata"
                                            typefield="tel_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="text" dir="rtl" class="inputdata"
                                            typefield="battery_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="text" dir="rtl" class="inputdata"
                                            typefield="ventilation_system_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="text" dir="rtl" class="inputdata"
                                            typefield="internal_light_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="text" dir="rtl" class="inputdata"
                                            typefield="lift_room_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="text" dir="rtl" class="inputdata"
                                            typefield="door_condition_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="text" dir="rtl" class="inputdata"
                                            typefield="open_floor_level_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>
                                    <td>
                                        <input type="text" dir="rtl" class="inputdata"
                                            typefield="alarm_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>
                                    <td>
                                        <input type="text" dir="rtl" class="inputdata"
                                            typefield="location_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>
                                    <td>{{ $count }}</td>
                                </tr>

                                @php
                                    $count = $count + 1;
                                @endphp
                            @endwhile
                        @endif

                        @if (in_array($form->name, ['direct_status_report']))
                            <div>
                                <h6 style="text-align: right;">:الحالة</h6>
                                <textarea style="width: 100%;" dir="rtl" class="inputdata" typefield="status" id="status" name="status"
                                    rows="3" placeholder="ادخل الحالة"></textarea>
                            </div>

                            <div>
                                <h6 style="text-align: right;">:السبب</h6>
                                <textarea style="width: 100%;" dir="rtl" class="inputdata" typefield="reason" id="reason" name="reason"
                                    rows="3" placeholder="ادخل السبب"></textarea>
                            </div>

                            <div>
                                <h6 style="text-align: right;">:القسم</h6>
                                <textarea style="width: 100%;" dir="rtl" class="inputdata" typefield="section" id="section" name="section"
                                    rows="3" placeholder="ادخل القسم"></textarea>
                            </div>

                            <div>
                                <h6 style="text-align: right;">:الوقت</h6>
                                <textarea style="width: 100%;" dir="rtl" class="inputdata" typefield="time" id="time" name="time"
                                    rows="3" placeholder="ادخل الوقت"></textarea>
                            </div>

                            <div>
                                <h6 style="text-align: right;">:الملاحظات</h6>
                                <textarea style="width: 100%;" dir="rtl" class="inputdata" typefield="notes" id="notes" name="notes"
                                    rows="3" placeholder="ادخل الملاحظات"></textarea>
                            </div>
                        @endif

                        @if (in_array($form->name, ['fire_extinguishers']))

                            @while ($count < 13)
                                <tr>

                                    <td>
                                        <select class="comments" typefield="pressure_{{ $count }}"
                                            form="{{ $form->name }}"
                                            id="{{ $form->name }}_pressure_{{ $count }}"
                                            checkboxtype="pressure" checkboxvalue="{{ $count }}">
                                            <option value="">لا شيء</option>
                                            <option value="✔️">✔️</option>
                                            <option value="❌">❌</option>
                                        </select>
                                    </td>

                                    <td>
                                        <select class="comments" typefield="gauge_{{ $count }}"
                                            form="{{ $form->name }}"
                                            id="{{ $form->name }}_gauge_{{ $count }}"
                                            checkboxtype="gauge" checkboxvalue="{{ $count }}">
                                            <option value="">لا شيء</option>
                                            <option value="✔️">✔️</option>
                                            <option value="❌">❌</option>
                                        </select>
                                    </td>

                                    <td>
                                        <select class="comments" typefield="hose_{{ $count }}"
                                            form="{{ $form->name }}"
                                            id="{{ $form->name }}_hose_{{ $count }}" checkboxtype="hose"
                                            checkboxvalue="{{ $count }}">
                                            <option value="">لا شيء</option>
                                            <option value="✔️">✔️</option>
                                            <option value="❌">❌</option>
                                        </select>
                                    </td>

                                    <td>
                                        <select class="comments" typefield="pin_{{ $count }}"
                                            form="{{ $form->name }}"
                                            id="{{ $form->name }}_pin_{{ $count }}" checkboxtype="pin"
                                            checkboxvalue="{{ $count }}">
                                            <option value="">لا شيء</option>
                                            <option value="✔️">✔️</option>
                                            <option value="❌">❌</option>
                                        </select>
                                    </td>

                                    <td>
                                        <select class="comments" typefield="cylinder_{{ $count }}"
                                            form="{{ $form->name }}"
                                            id="{{ $form->name }}_cylinder_{{ $count }}"
                                            checkboxtype="cylinder" checkboxvalue="{{ $count }}">
                                            <option value="">لا شيء</option>
                                            <option value="✔️">✔️</option>
                                            <option value="❌">❌</option>
                                        </select>
                                    </td>


                                    <td>
                                        <select class="comments" typefield="cabinet_{{ $count }}"
                                            form="{{ $form->name }}"
                                            id="{{ $form->name }}_cabinet_{{ $count }}"
                                            checkboxtype="cabinet" checkboxvalue="{{ $count }}">
                                            <option value="">لا شيء</option>
                                            <option value="✔️">✔️</option>
                                            <option value="❌">❌</option>
                                        </select>
                                    </td>

                                    <td>
                                        <select class="comments" typefield="bracket_{{ $count }}"
                                            form="{{ $form->name }}"
                                            id="{{ $form->name }}_bracket_{{ $count }}"
                                            checkboxtype="bracket" checkboxvalue="{{ $count }}">
                                            <option value="">لا شيء</option>
                                            <option value="✔️">✔️</option>
                                            <option value="❌">❌</option>
                                        </select>
                                    </td>

                                    <td>
                                        <select class="comments" typefield="capacity_{{ $count }}"
                                            form="{{ $form->name }}"
                                            id="{{ $form->name }}_capacity_{{ $count }}"
                                            checkboxtype="capacity" checkboxvalue="{{ $count }}">
                                            <option value="6 Kg">6 Kg</option>
                                            <option value="4 Kg">4 Kg</option>
                                            <option value="2 Kg">2 Kg</option>
                                        </select>
                                    </td>

                                    <td>
                                        <select class="comments" typefield="type_{{ $count }}"
                                            id="{{ $form->name }}_type_{{ $count }}" checkboxtype="type"
                                            checkboxvalue="{{ $count }}">
                                            <option value="co2">co2</option>
                                            <option value="بودره">بودره</option>
                                            <option value="زيتية">زيتية</option>
                                        </select>
                                    </td>

                                    <td>
                                        <input type="text" dir="rtl" class="comments"
                                            typefield="location_{{ $count }}" id="widht"
                                            count="{{ $count }}">
                                    </td>

                                    <td>
                                        <input type="text" dir="rtl" class="comments"
                                            typefield="extinguisher_{{ $count }}" id="widht"
                                            count="{{ $count }}">
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


            <div>
                <button type="button" class="btn btn-success save" buttontype="{{ $form->name }}"
                    id="buttonstyle">حفظ
                    البيانات</button>
            </div>
        </div>

    @endif





</div>
