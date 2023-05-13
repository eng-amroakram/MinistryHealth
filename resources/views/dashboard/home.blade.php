@extends('parts.dashboard.layout')
@section('content')
    <div class="content">

        <div class="row">

            <div class="col-lg-3 text-right">
                <div class="card card-chart">
                    <div class="card-header">
                        <h3 class="card-category text-white" style="font-size: 1.3rem;">عدد الموظفين</h3>
                        <h3 class="card-title"><i class="tim-icons icon-single-02 text-success"></i> {{ employeeCount() }}</h3>
                    </div>
                </div>
            </div>

            {{-- <div class="col-lg-3 text-right">
                <div class="card card-chart">
                    <div class="card-header">
                        <h3 class="card-category text-white" style="font-size: 1.3rem;">الجولات اليومية</h3>
                        <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i> 3</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 text-right">
                <div class="card card-chart">
                    <div class="card-header">
                        <h3 class="card-category text-white" style="font-size: 1.3rem;">الجولات الشهرية</h3>
                        <h3 class="card-title"><i class="tim-icons icon-delivery-fast text-info"></i> 3</h3>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 text-right">
                <div class="card card-chart">
                    <div class="card-header">
                        <h5 class="card-category text-white" style="font-size: 1.3rem;">المهام المكتملة</h5>
                        <h3 class="card-title"><i class="tim-icons icon-send text-success"></i> 10</h3>
                    </div>
                </div>
            </div> --}}

        </div>
    </div>
@endsection
