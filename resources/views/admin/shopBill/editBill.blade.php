@extends('admin.master')

@section('title', 'MMC || Edit Bill')

@push('css')
    <link rel="stylesheet" href="{{ asset('css/parsley.css') }}">
@endpush

@section('content')
    <div class="content-wrapper" style="min-height: 500px">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <ol class="breadcrumb ml-auto">
                            <li class="breadcrumb-item active text-bold text-muted">Bill</li>
                            <li class="breadcrumb-item active">Edit Bill</li>
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
                    <div class="offset-2 col-md-8">
                        <!-- general form elements -->
                        <div class="card card-default">
                            <div class="card-header text-muted text-bold">
                                {{ __('EDIT BILL') }}
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{Form::model($bill,['route'=>'updateBill','method'=>'post','class'=>'form-horizontal', 'data-parsley-validate' => ''])}}
                            <div class="card-body">
                                <div class="form-group row">
                                    {{Form::label('month','Month',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                    <div class="col-md-6">
                                        {{Form::hidden('shop_id',$bill->shop_id,['class'=>'form-control','id'=>'shop_id'])}}
                                        {{Form::hidden('id',$bill->id,['class'=>'form-control','id'=>'id'])}}
                                        {{Form::hidden('shop_floor',$bill->floor,['class'=>'form-control','id'=>'shop_floor'])}}
                                        {{Form::select('month',[null=>'--Select One---','January'=>'January','February'=>'February','March'=>'March',
                                        'April'=>'April','May'=>'May','Jun'=>'Jun','July'=>'July','August'=>'August','September'=>'September',
                                        'October'=>'October','November'=>'November','December'=>'December'],$bill->month,['class'=>'form-control','id'=>'month', 'required' => ''])}}
                                        <span class="text-danger text-bold">{{$errors->has('month') ? $errors->first('month') : ''}}</span>
                                        <span class="text-danger text-bold">{{$errors->has('shop_id') ? $errors->first('shop_id') : ''}}</span>
                                        <span class="text-danger text-bold">{{$errors->has('id') ? $errors->first('id') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('year','Year',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                    <div class="col-md-6">
                                        {{Form::select('year',[null=>'--Select One---','2019'=>'2019','2020'=>'2020','2021'=>'2021',
                                        '2022'=>'2022','2023'=>'2023','2024'=>'2024','2025'=>'2025','2026'=>'2026','2027'=>'2027',
                                        '2028'=>'2028','2029'=>'2029','2030'=>'2030'],$bill->year,['class'=>'form-control','id'=>'year', 'required' => ''])}}
                                        {{Form::hidden('bill_id',$bill->bill_id,['class'=>'form-control','id'=>'bill_id'])}}
                                        <span class="text-danger text-bold">{{$errors->has('year') ? $errors->first('year') : ''}}</span>
                                        <span class="text-danger text-bold" id="bill_id_error">{{$errors->has('bill_id') ? $errors->first('bill_id') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('current_unit','Current Unit',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                    <div class="col-md-6">
                                        {{Form::text('current_unit',$bill->current_unit,['class'=>'form-control','placeholder'=>'Enter current unit','id'=>'current_unit', 'required' => ''])}}
                                        <span class="text-danger text-bold">{{$errors->has('current_unit') ? $errors->first('current_unit') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('previous_unit','Previous Unit',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                    <div class="col-md-6">
                                        {{Form::text('previous_unit',$bill->previous_unit,['class'=>'form-control','placeholder'=>'Enter previous unit','id'=>'previous_unit', 'required' => ''])}}
                                        <span class="text-danger text-bold">{{$errors->has('previous_unit') ? $errors->first('previous_unit') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('used_unit','Used Unit',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                    <div class="col-md-6">
                                        {{Form::text('used_unit',$bill->used_unit,['class'=>'form-control','placeholder'=>'Enter used unit','id'=>'used_unit', 'required' => ''])}}
                                        <span class="text-danger text-bold">{{$errors->has('used_unit') ? $errors->first('used_unit') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('unit_rate','Unit Rate',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                    <div class="col-md-6">
                                        {{Form::text('unit_rate',$bill->unit_rate,['class'=>'form-control','placeholder'=>'Enter used unit','id'=>'unit_rate', 'required' => ''])}}
                                        <span class="text-danger text-bold">{{$errors->has('unit_rate') ? $errors->first('unit_rate') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('previous_due','Previous Due',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                    <div class="col-md-6">
                                        {{Form::text('previous_due',$bill->previous_due,['class'=>'form-control','placeholder'=>'Enter previous due','id'=>'previous_due', 'required' => ''])}}
                                        <span class="text-danger text-bold">{{$errors->has('previous_due') ? $errors->first('previous_due') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('additional_fee','Additional Fee',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                    <div class="col-md-6">
                                        {{Form::text('additional_fee',$bill->additional_fee,['class'=>'form-control','placeholder'=>'Enter additional fee','id'=>'additional_fee', 'required' => ''])}}
                                        <span class="text-danger text-bold">{{$errors->has('additional_fee') ? $errors->first('additional_fee') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('total_amount','Total Amount',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                    <div class="col-md-6">
                                        {{Form::hidden('total_amount_due',$bill->exclude_due,['class'=>'form-control','placeholder'=>'Enter total amount','id'=>'total_amount_due'])}}
                                        {{Form::hidden('exclude_fee',$bill->exclude_fee,['class'=>'form-control','placeholder'=>'Enter total amount','id'=>'exclude_fee'])}}
                                        {{Form::hidden('total_amount_add_fee','',['class'=>'form-control','placeholder'=>'Enter total amount','id'=>'total_amount_add_fee'])}}
                                        {{Form::text('total_amount',$bill->total_amount,['class'=>'form-control','placeholder'=>'Enter total amount','id'=>'total_amount', 'required' => ''])}}
                                        {{Form::hidden('after_date',$bill->after_date,['class'=>'form-control','placeholder'=>'Enter total amount','id'=>'after_date'])}}
                                        <span class="text-danger text-bold">{{$errors->has('total_amount') ? $errors->first('total_amount') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('paid_amount','Paid Amount',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                    <div class="col-md-6">
                                        {{Form::text('paid_amount',$bill->paid_amount,['class'=>'form-control','placeholder'=>'Enter paid amount','id'=>'paid_amount', 'required' => ''])}}
                                        <span class="text-danger text-bold">{{$errors->has('paid_amount') ? $errors->first('paid_amount') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('due_amount','Due Amount',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                    <div class="col-md-6">
                                        {{Form::text('due_amount',$bill->due_amount,['class'=>'form-control','placeholder'=>'Enter due amount','id'=>'due_amount', 'required' => ''])}}
                                        <span class="text-danger text-bold">{{$errors->has('due_amount') ? $errors->first('due_amount') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('payment_status','Payment Status',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                    <div class="col-md-6">
                                        {{Form::text('payment_status',$bill->payment_status,['class'=>'form-control disabled','placeholder'=>'Enter payment status','id'=>'payment_status', 'required' => ''])}}
                                        <span class="text-danger text-bold">{{$errors->has('payment_status') ? $errors->first('payment_status') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('last_date','Last Pay Date',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                    <div class="col-md-6">
                                        {{Form::text('last_date',$bill->last_date,['class'=>'form-control disabled','placeholder'=>'Set last pay date','id'=>'datepicker', 'required' => ''])}}
                                        <span class="text-danger text-bold">{{$errors->has('last_date') ? $errors->first('last_date') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        {{Form::submit('Update',['class'=>'btn btn-primary'])}}
                                    </div>
                                </div>
                            </div>
                            <!-- /.card-body -->
                            {{Form::close()}}
                        </div>
                        <!-- /.card -->

                    </div>
                    <!--/.col (left) -->
                    <!-- right column -->
                    <!--/.col (right) -->
                </div>
                <!-- /.row -->
            </div><!-- /.container-fluid -->
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('scripts')
    <script src="{{ asset('js/parsley.js') }}"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#month").on("change", function() {
                let a = $('#shop_id').val();
                let b = $('#month').val();
                let c = b.toLowerCase();
                let d = $("#year").val();
                let sum = a + '_' + c + '_' + d;
                $('#bill_id').val(sum);
                let bill_id = $('#bill_id').val();
                $.ajax({
                    type: "POST",
                    url: '{{URL::to("/bill_id_validation")}}',
                    data: {
                        bill_id: bill_id,
                        field: 'bill_id',
                        _token: '{{csrf_token()}}',
                    },
                    dataType: 'html',

                    success: function (response) {
                        $('#bill_id_error').html(response);

                    }
                });
            })
            $("#year").on("change", function() {
                let a = $('#shop_id').val();
                let b = $('#month').val();
                let c = b.toLowerCase();
                let d = $("#year").val();
                let sum = a + '_' + c + '_' + d;
                $('#bill_id').val(sum);
                let bill_id = $('#bill_id').val();
                $.ajax({
                    type: "POST",
                    url: '{{URL::to("/bill_id_validation")}}',
                    data: {
                        bill_id: bill_id,
                        field: 'bill_id',
                        _token: '{{csrf_token()}}',
                    },
                    dataType: 'html',

                    success: function (response) {
                        $('#bill_id_error').html(response);

                    }
                });
            })
            $("#current_unit").on("keyup", function() {

                if ($('#current_unit').val() == 'month' || $('#current_unit').val() == 'Month') {
                    $('#current_unit').val('Month');
                    $('#previous_unit').val('Month');
                    $('#used_unit').val('Month');
                    $('#unit_rate').val('Month');
                    $('#previous_due').val(0);
                    $('#additional_fee').val(0);
                    $('#total_amount_due').val(500)
                    $('#exclude_fee').val(500)
                    $('#total_amount').val(500);
                    $('#after_date').val(500+200);
                    $('#paid_amount').val(0);
                    $('#due_amount').val(500);
                    $('#payment_status').val('Due');
                    $("#total_amount").on("blur", function () {
                        let a = parseInt($('#total_amount').val());
                        let b = parseInt($("#previous_due").val());
                        let total = a + b;
                        $("#total_amount").val(total);
                    })
                }
                else {
                    $('#previous_unit').val('');
                    $('#used_unit').val('');
                    $("#previous_unit").on("keyup", function () {
                        let a = parseInt($('#current_unit').val());
                        let b = parseInt($("#previous_unit").val());
                        $('#unit_rate').val(12);
                        let c = parseInt($("#unit_rate").val());
                        $('#previous_due').val(0);
                        let d = parseInt($('#previous_due').val());
                        $('#additional_fee').val(0);
                        let e = parseInt($('#additional_fee').val());
                        let used_unit = a - b ;
                        let sum = used_unit * c ;
                        let duefee = d + e;
                        let total = sum + duefee;
                        if (total < 500)
                        {
                            let additional = 500 - total;
                            $('#used_unit').val(used_unit);
                            $('#additional_fee').val(additional);
                            $('#exclude_fee').val(sum);
                            $('#total_amount').val(500);
                            $('#after_date').val(500+200);
                            $('#total_amount_due').val(500);
                            $('#total_amount_add_fee').val(500);
                            $('#paid_amount').val(0);
                            $('#due_amount').val(500);
                            $('#payment_status').val('Due');
                        }
                        else
                        {
                            $('#used_unit').val(used_unit);
                            $('#exclude_fee').val(sum);
                            $('#total_amount_due').val(total);
                            $('#total_amount_add_fee').val(total);
                            $('#total_amount').val(total);
                            $('#after_date').val(total+200);
                            $('#paid_amount').val(0);
                            $('#due_amount').val(total);
                            $('#payment_status').val('Due');
                        }
                    })
                }
            })

            $("#previous_due").on("keyup", function () {
                const a = parseInt($('#total_amount_due').val());
                let b = parseInt($('#previous_due').val());
                let sum = a + b;
                let total = sum;
                $('#total_amount').val(total);
                $('#after_date').val(total+200);
                $('#paid_amount').val(0);
                $('#due_amount').val(total);
                $   ('#payment_status').val('Due');
            })

            $("#paid_amount").on("keyup", function() {
                let a = $('#total_amount').val();
                let b = $("#paid_amount").val();
                let due = a-b;
                $('#due_amount').val(due);
                let c = $('#due_amount').val();
                if(b != 0 && c != 0)
                {
                    $('#payment_status').val('Partial');
                }
                else if(b != 0)
                {
                    $('#payment_status').val('Paid');
                }
                else
                {
                    $('#payment_status').val('Due');
                }
            })

        })
    </script>

@endpush
