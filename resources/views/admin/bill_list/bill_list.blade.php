@extends('admin.master')

@section('title', 'MMC || Bill List')



@push('css')

@endpush

@section('content')
    <div class="content-wrapper" style="min-height: 500px">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb ml-auto">
                            <li class="breadcrumb-item active text-muted text-bold">Bill</li>
                            <li class="breadcrumb-item active">Bill List</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <div class="row">
                    <!-- left column -->
                    <div class="col-md-12">
                        <!-- general form elements -->
                        <div class="card card-default">
                            <div class="card-header text-muted">
                                <div class="row">
                                    <div class="col-md-4 mt-1 text-muted text-bold">{{ __('BILL LIST') }}</div>
                                    <div class="form-inline col-md-8">
                                        {{Form::open(['route'=>'monthlyBill','method'=>'post','class'=>'form-horizontal'])}}
                                        <div class="form-group float-left">

                                                {{Form::select('month',[null=>'--Select Month---','January'=>'January','February'=>'February','March'=>'March',
                                                'April'=>'April','May'=>'May','Jun'=>'Jun','July'=>'July','August'=>'August','September'=>'September',
                                                'October'=>'October','November'=>'November','December'=>'December'],'0',['class'=>'form-control','id'=>'month'])}}
                                                <span class="text-danger text-bold">{{$errors->has('month') ? $errors->first('month') : ''}}</span>
                                                <span class="text-danger text-bold">{{$errors->has('shop_id') ? $errors->first('shop_id') : ''}}</span>
                                        </div>

                                        <div class="form-group float-left ml-2">


                                                {{Form::select('year',[null=>'--Select Year---','2019'=>'2019','2020'=>'2020','2021'=>'2021',
                                                '2022'=>'2022','2023'=>'2023','2024'=>'2024','2025'=>'2025','2026'=>'2026','2027'=>'2027',
                                                '2028'=>'2028','2029'=>'2029','2030'=>'2030'],'0',['class'=>'form-control','id'=>'year'])}}
                                                <span class="text-danger text-bold">{{$errors->has('year') ? $errors->first('year') : ''}}</span>

                                        </div>

                                        <div class="form-group float-left ml-2">


                                            {{Form::select('floor',[null=>'--Select Floor---','1'=>'First Floor','2'=>'Second Floor'],'0',['class'=>'form-control','id'=>'year'])}}
                                            <span class="text-danger text-bold">{{$errors->has('year') ? $errors->first('year') : ''}}</span>

                                        </div>

                                        <div class="form-group float-left ml-5">
                                            {{Form::submit('GET REPORT',['class'=>'btn btn-primary'])}}
                                        </div>

                                    </div>
                                    {{Form::close()}}
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <table id="mytable" class="table table-bordered table-striped text-center">
                                    <thead>
                                    <tr class="">
                                        <th width="50%">Shop No</th>
                                        <th width="5%">Floor</th>
                                        <th width="5%">Month</th>
                                        <th width="5%">Year</th>
                                        <th width="9%">Current Unit</th>
                                        <th width="9%">Previous Unit</th>
                                        <th width="9%">Used Unit</th>
                                        <th width="5%">Previous Due</th>
                                        <th width="3%">Additional Fee</th>
                                        <th width="5%">Total Amount</th>
                                        <th width="5%">Paid Amount</th>
                                        <th width="5%">Due Amount</th>
                                        <th width="5%">Payment</th>
                                    </tr>
                                    </thead>
                                <tbody id="normal">

                                @if($bill_list->count() > 0)

                                     @foreach($bill_list as $bill)
                                    <tr class="text-bold text-secondary">
                                        <td>{{$bill->shop->shop_no}}</td>
                                        <td>{{$bill->shop->floor}}</td>
                                        <td>{{$bill->month}}</td>
                                        <td>{{$bill->year}}</td>
                                        <td>{{$bill->current_unit}}</td>
                                        <td>{{$bill->previous_unit}}</td>
                                        <td>{{$bill->used_unit}}</td>
                                        <td>{{$bill->previous_due}}</td>
                                        <td>{{$bill->additional_fee}}</td>
                                        <td>{{$bill->total_amount}}</td>
                                        <td>{{$bill->paid_amount}}</td>
                                        <td>{{$bill->due_amount}}</td>
                                        <td>
                                            @if($bill->payment_status == 'Paid')
                                            <span class="text-bold text-success">{{$bill->payment_status}}</span>
                                            @elseif($bill->payment_status == 'Due')
                                            <span class="text-bold text-danger">{{$bill->payment_status}}</span>
                                            @else
                                            <span class="text-bold text-primary">{{$bill->payment_status}}</span>
                                            @endif
                                        </td>
                                    </tr>
                                    @endforeach

                                @else
                                <tr>
                                    <td colspan="12">
                                       <span class="text-bold text-danger">No bill available for this shop..!!</span>
                                    </td>
                                </tr>
                                @endif

                                </tbody>
                                    <tbody id="success" style="display: none">

                                    </tbody>
                                </table>
                        </div>

                        <!-- /.card -->
                            <div class="ml-auto mr-2 mt-2" id="billLink">
                                {{ $bill_list->links() }}
                            </div>

                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div>
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('scripts')

@endpush

