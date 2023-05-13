<div class="content" wire:ignore.self>

    <div class="row" wire:ignore.self>
        <div class="col-lg-3 text-right" wire:ignore.self>
            <div class="card card-chart" wire:ignore.self>
                <div class="card-header" wire:ignore.self>
                    <h3 class="card-category text-white" style="font-size: 1.3rem;" wire:ignore.self>عدد الموظفين</h3>
                    <h3 class="card-title"><i class="tim-icons icon-single-02 text-success" wire:ignore.self></i>
                        {{ $employeeCount }}
                    </h3>
                </div>
            </div>
        </div>
    </div>

    <div class="row supreme-container" wire:ignore.self>
        <div class="col-lg-12 col-sm-12 text-center" wire:ignore.self>
            <div class="card " wire:ignore.self>
                <div class="card-header text-right" wire:ignore.self>
                    <h4 class="title d-inline" style="font-weight: bold;">البحث:</h4>
                    &nbsp;&nbsp;
                    <input type="text" class="form-control" wire:model='search' placeholder="ابحث عن الموظف"
                        style="display: initial; width: 20%;">
                    <div class="dropdown float-left">

                        <button type="button" rel="tooltip" data-toggle="modal" data-target="#createNewEmployee"
                            class="btn btn-success btn-link btn-icon btn-sm">
                            <i class="tim-icons icon-simple-add"></i>
                        </button>

                        <button type="button" rel="tooltip" data-toggle="modal" data-target="#trashedEmployee"
                            class="btn btn-danger btn-link btn-icon btn-sm">
                            <i class="tim-icons icon-trash-simple"></i>
                        </button>

                        <a class="btn btn-link dropdown-toggle" id="dropdownMenuLink" data-toggle="dropdown"
                            aria-haspopup="true" aria-expanded="false" @disabled(true)>
                            <i class="tim-icons icon-settings-gear-63"></i></a>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                            <a class="dropdown-item" href="#">عمل</a>
                            <a class="dropdown-item" href="#">عمل آخر</a>
                            <a class="dropdown-item" href="#">شيء آخر هنا</a>
                        </div>
                    </div>
                </div>


                <div style="padding: 30px;" wire:ignore.self>

                    <table class="table table-bordered border-success text-center" wire:ignore.self>
                        <thead>
                            <tr>
                                <th class="text-center text-white" style="font-size: 1rem;">الترتيب</th>
                                <th class="text-center text-white" style="font-size: 1rem;">اسم الموظف</th>
                                <th class="text-center text-white" style="font-size: 1rem;">المسمى الوظيفي</th>
                                <th class="text-center text-white" style="font-size: 1rem;">الرقم الوظيفي</th>
                                <th class="text-center text-white" style="font-size: 1rem;">رقم الهوية</th>
                                <th class="text-center text-white" style="font-size: 1rem;">التحكم</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($employees as $employee)
                                <tr>
                                    <td>{{ $employee->id }}</td>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->job_title }}</td>
                                    <td>{{ $employee->employee_number }}</td>
                                    <td>{{ $employee->id_number }}</td>
                                    <td class="td-actions">
                                        <a type="button" rel="tooltip" class="btn btn-info btn-link btn-icon btn-sm"
                                            href="{{ route('web.employee.forms', $employee->id) }}">
                                            <i class="tim-icons icon-notes"></i>
                                        </a>
                                        <button type="button" rel="tooltip" data-toggle="modal"
                                            data-target="#editEmployee"
                                            wire:click="$emit('openEditEmployeeModal', {{ $employee->id }})"
                                            class="btn btn-success btn-link btn-icon btn-sm">
                                            <i class="tim-icons icon-pencil"></i>
                                        </button>

                                        <button type="button" rel="tooltip"
                                            class="btn btn-danger btn-link btn-icon btn-sm"
                                            wire:click="delete({{ $employee->id }})">
                                            <i class="tim-icons icon-simple-remove"></i>
                                        </button>

                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                    {{-- Pagination Pages --}}
                    <div class="d-flex justify-content-between mx-0 row">
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
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="trashedEmployee" tabindex="-1" role="dialog"
        aria-labelledby="trashedEmployeeLabel" aria-hidden="true" wire:ignore.self>
        <div class="modal-dialog modal-lg" role="document" wire:ignore.self>
            <div class="modal-content card" wire:ignore.self>

                <div class="modal-header card-header" style="justify-content: space-around; padding:24px" wire:ignore>
                    <h3 class="title text-white">سلة المهملات للموظفين</h3>
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
                        <i class="tim-icons icon-simple-remove"></i>
                    </button>
                </div>

                <div class="modal-body card-body text-center p-4" wire:ignore.self>
                    <table class="table text-center" wire:ignore.self>
                        <thead>
                            <tr>
                                <th class="text-center text-white" style="font-size: 1rem;">اسم الموظف</th>
                                <th class="text-center text-white" style="font-size: 1rem;">المسمى الوظيفي</th>
                                <th class="text-center text-white" style="font-size: 1rem;">الرقم الوظيفي</th>
                                <th class="text-center text-white" style="font-size: 1rem;">التحكم</th>
                            </tr>
                        </thead>
                        <tbody>

                            @foreach ($trashedEmployees as $employee)
                                <tr>
                                    <td>{{ $employee->name }}</td>
                                    <td>{{ $employee->job_title }}</td>
                                    <td>{{ $employee->employee_number }}</td>
                                    <td class="td-actions">
                                        <button type="button" rel="tooltip"
                                            class="btn btn-success btn-link btn-icon btn-sm"
                                            wire:click="restore({{ $employee->id }})">
                                            <i class="tim-icons icon-refresh-02"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>

                    {{-- Pagination Pages --}}
                    <div class="d-flex justify-content-between mx-0 row">

                        <div class="col-sm-12 col-md-6 text-right">
                            <div class="text-white" role="status" aria-live="polite">
                                <pre>إظهار {{ $trashedEmployees->perPage() }} من اصل {{ $trashedEmployees->total() }}</pre>
                            </div>
                        </div>

                        <div class="col-sm-12 col-md-6">
                            <div class="float-left">
                                <ul class="pagination pagination-sm">
                                    {{ $trashedEmployees->withQueryString()->onEachSide(0)->links() }}
                                </ul>
                            </div>
                        </div>
                    </div>

                </div>

                <div class="modal-footer card-footer" style="display: block;" wire:ignore.self>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">إغلاق</button>
                    {{-- <button type="button" class="btn btn-success" wire:click='save'>حفظ</button> --}}
                </div>

            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-lg" id="createNewEmployee" tabindex="-1" role="dialog"
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
    </div>

    @push('employee_script')
        <script>
            window.livewire.on('submit', () => {
                $('#createNewEmployee').modal('hide');
                $('#editEmployee').modal('hide');
                console.log('Ok');
            })

            window.livewire.on('close', () => {
                $('#createNewEmployee').modal('hide');
                $('#trashedEmployee').modal('hide');
                console.log('Ok');
            })
        </script>
    @endpush

</div>
