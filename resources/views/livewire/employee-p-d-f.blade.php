<div class="content" wire:ignore.self>

    <div class="row" wire:ignore.self>
        <div class="col-lg-3 text-right" wire:ignore.self>
            <div class="card card-chart" wire:ignore.self>
                <div class="card-header" wire:ignore.self>
                    <h3 class="card-category text-white" style="font-size: 1.3rem;" wire:ignore.self>
                        <strong>الموظف: </strong>
                    </h3>

                    <h4 class="card-title">
                        <i class="tim-icons icon-single-02 text-success" wire:ignore.self></i>
                        {{ $employee->name }}
                    </h4>

                    <h4 class="card-title">
                        <i class="tim-icons icon-badge text-success" wire:ignore.self></i>
                        {{ $employee->employee_number }}
                    </h4>

                    {{-- button to download image --}}

                    <button type="button" rel="tooltip" class="btn btn-success mb-3" wire:click="downloadSignature">
                        <i class="tim-icons icon-cloud-download-93"></i>

                        تحميل توقيع الموظف
                    </button>



                </div>
            </div>
        </div>
    </div>

    <div class="row supreme-container" wire:ignore.self>

        <div class="col-lg-6 col-sm-6" wire:ignore.self>
            <div class="card " wire:ignore.self>

                <div class="card-header text-right" wire:ignore.self>
                    <h4 class="title d-inline" style="font-weight: bold;">اختيار النموذج:</h4>
                    &nbsp;&nbsp;
                    <select class="form-select" wire:model="form_id" style="display: initial; width: 20%;">
                        @foreach ($forms as $form)
                            <option value="{{ $form->id }}">{{ __("$form->name") }}</option>
                        @endforeach
                    </select>



                    {{-- <div class="dropdown float-left">

                        <button type="button" rel="tooltip" data-toggle="modal" data-target="#createNewEmployee"
                            class="btn btn-success btn-link btn-icon btn-sm">
                            <i class="tim-icons icon-simple-add"></i>
                        </button>

                        <button type="button" rel="tooltip" data-toggle="modal" data-target="#trashedEmployee"
                            class="btn btn-danger btn-link btn-icon btn-sm">
                            <i class="tim-icons icon-trash-simple"></i>
                        </button>

                        <a class="btn btn-link dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false"><i
                                class="tim-icons icon-settings-gear-63"></i>
                            </a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">عمل</a>
                            <a class="dropdown-item" href="#">عمل آخر</a>
                            <a class="dropdown-item" href="#">شيء آخر هنا</a>
                        </div>
                    </div> --}}
                </div>

                <div style="padding: 20px;" wire:ignore.self>

                    <table class="table text-center" wire:ignore.self>

                        <thead>
                            <tr>
                                <th class="text-center text-white" style="font-size: 1rem;">الترتيب</th>
                                <th class="text-center text-white" style="font-size: 1rem;">رقم النموذج</th>
                                <th class="text-center text-white" style="font-size: 1rem;">التاريخ</th>
                                <th class="text-center text-white" style="font-size: 1rem;">التحكم</th>
                            </tr>
                        </thead>

                        <tbody>

                            @foreach ($solutions as $solution)
                                <tr>
                                    <td>{{ $solution->id }}</td>
                                    <td>{{ $solution->form_id }}</td>
                                    <td>{{ $solution->created_at->format('Y-m-d') }}</td>
                                    <td class="td-actions">
                                        <div class="spinner-grow text-warning" wire:loading role="status">
                                            <span class="visually-hidden">Loading...</span>
                                        </div>
                                        <button type="button" rel="tooltip"
                                            class="btn btn-warning btn-link btn-icon btn-sm"
                                            wire:click="openForm({{ $solution->id }})">
                                            <i class="tim-icons icon-cloud-upload-94"></i>
                                        </button>

                                        {{-- <button type="button" rel="tooltip"
                                            class="btn btn-success btn-link btn-icon btn-sm">
                                            <i class="tim-icons icon-mobile"></i>
                                        </button>

                                        <button type="button" rel="tooltip"
                                            class="btn btn-danger btn-link btn-icon btn-sm">
                                            <i class="tim-icons icon-simple-remove"></i>
                                        </button> --}}
                                    </td>

                                </tr>
                            @endforeach



                        </tbody>
                    </table>
                    {{-- Pagination Pages --}}
                    {{-- <div class="d-flex justify-content-between mx-0 row">
                        <div class="col-sm-12 col-md-6 text-right">
                            <div class="text-white" role="status" aria-live="polite">
                                <pre>إظهار {{ $employees->perPage() }} من اصل {{ $employees->total() }}</pre>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="float-left">
                                <ul class="pagination pagination-sm">
                                    {{ $employees->withQueryString()->onEachSide(0)->links() }}
                                </ul>
                            </div>
                        </div>
                    </div> --}}
                </div>

            </div>
        </div>

        <div class="col-lg-6 col-sm-6 text-center" wire:ignore.self>
            <div class="card " wire:ignore.self>
                <iframe id="pdfframe" src="{{ $pdf_path }}" width="100%" height="670px">
                </iframe>
            </div>
        </div>
    </div>

    {{-- <div class="modal fade bd-example-modal-lg" id="createNewEmployee" tabindex="-1" role="dialog"
        aria-labelledby="createNewEmployeeLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document" wire:ignore.self>
            <div class="modal-content card" wire:ignore.self>

                <div class="modal-header card-header" style="justify-content: space-around; padding:24px" wire:ignore>
                    <h3 class="title text-white">إضافة موظف جديد</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="tim-icons icon-simple-remove"></i>
                    </button>
                </div>

                <div class="modal-body card-body text-right p-4" wire:ignore.self>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-white" style="font-size: 0.9rem; font-weight: bold;">اسم
                                    الموظف</label>
                                <input type="text" class="form-control" maxlength="25" wire:model='employee_name'
                                    placeholder="اسم الموظف">
                                @error('employee_name')
                                    <small class="text-danger"
                                        style="font-size: 0.7rem; font-weight: bold;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-white" style="font-size: 0.9rem; font-weight: bold;">رقم
                                    الموظف</label>
                                <input type="text" class="form-control" maxlength="10"
                                    wire:model='employee_number' placeholder="رقم الموظف">
                                @error('employee_number')
                                    <small class="text-danger"
                                        style="font-size: 0.7rem; font-weight: bold;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-white" style="font-size: 0.9rem; font-weight: bold;">المسمى
                                    الوظيفي</label>
                                <input type="text" class="form-control" maxlength="25" wire:model="job_title"
                                    placeholder="المسمى الوظيفي">
                                @error('job_title')
                                    <small class="text-danger"
                                        style="font-size: 0.7rem; font-weight: bold;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-white" style="font-size: 0.9rem; font-weight: bold;">رقم
                                    الهوية</label>
                                <input type="text" class="form-control" maxlength="10" wire:model='id_number'
                                    placeholder="رقم الهوية">
                                @error('id_number')
                                    <small class="text-danger"
                                        style="font-size: 0.7rem; font-weight: bold;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label class="text-white" style="font-size: 0.9rem; font-weight: bold;">كلمة
                                    السر</label>
                                <input type="password" class="form-control" maxlength="25" wire:model="password"
                                    placeholder="كلمة السر">
                                @error('password')
                                    <small class="text-danger"
                                        style="font-size: 0.7rem; font-weight: bold;">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>

                    </div>
                </div>

                <div class="modal-footer card-footer" style="display: block;" wire:ignore.self>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    <button type="button" class="btn btn-success" wire:click='save'>حفظ</button>
                </div>

            </div>
        </div>
    </div> --}}

    @push('employee_script')
        <script>
            window.livewire.on('submit', () => {
                $('#createNewEmployee').modal('hide');
                $('#editEmployee').modal('hide');
                console.log('Ok');
            })

            window.livewire.on('close', () => {
                $('#trashedEmployee').modal('hide');
                console.log('Ok');
            })

            window.livewire.on('refreshIframe', (path) => {
                $('#pdfframe').attr('src', path);
                console.log('Ok');

            })
        </script>
    @endpush

</div>
