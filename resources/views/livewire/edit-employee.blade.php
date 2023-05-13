<div class="modal fade bd-example-modal-lg" id="editEmployee" tabindex="-1" role="dialog"
    aria-labelledby="editEmployeeLabel" aria-hidden="true" wire:ignore.self>
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
                            <input type="text" class="form-control" maxlength="10" wire:model='employee_number'
                                placeholder="رقم الموظف">
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
                <button type="button" class="btn btn-success" wire:click='edit'>تعديل</button>
            </div>

        </div>
    </div>
</div>
