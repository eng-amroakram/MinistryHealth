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
            <div>
                <h6 style="text-align: right;">:الحالة</h6>
                <textarea style="width: 100%;" dir="rtl" class="textfield" name="status"
                    id="{{ $form->name }}_status" rows="3" placeholder="ادخل الحالة"></textarea>
            </div>

            <div>
                <h6 style="text-align: right;">:السبب</h6>

                <textarea style="width: 100%;" dir="rtl" class="textfield" name="reason"
                    id="{{ $form->name }}_reason" rows="3" placeholder="ادخل السبب"></textarea>
            </div>

            <div>
                <h6 style="text-align: right;">:القسم</h6>
                <textarea style="width: 100%;" dir="rtl" class="textfield" name="section"
                    id="{{ $form->name }}_section" rows="3" placeholder="ادخل القسم"></textarea>
            </div>

            <div>
                <h6 style="text-align: right;">:الوقت</h6>

                <textarea style="width: 100%;" dir="rtl" class="textfield" name="time"
                    id="{{ $form->name }}_time" rows="3" placeholder="ادخل الوقت"></textarea>

            </div>
        </tbody>
    </table>
</div>
