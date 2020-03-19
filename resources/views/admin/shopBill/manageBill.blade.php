@extends('admin.master')

@section('title', 'MMC || Manage Bill')



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
                            <li class="breadcrumb-item active">Manage Bill</li>
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
                                    <div class="col-md-4 mt-1 text-muted text-bold">{{$shop->shop_name}}({{$shop->shop_no}})</div>
                                    @if(Auth::user()-> role == 'super' || Auth::user()-> role == 'admin')
                                    <div class="form-group row col-md-7">
                                        <label for="search" class="col-md-3 col-form-label">Search By Field</label>
                                        <select name="field" id="field" class="col-md-4 custom-select">
                                            <option value="month">Month</option>
                                            <option value="year">Year</option>
                                            <option value="payment_status">Payment</option>
                                        </select>

                                        <select name="value" id="month" class="col-md-4 custom-select">
                                            <option value="">Select Month</option>
                                            <option value="January">January</option>
                                            <option value="February">February</option>
                                            <option value="March">March</option>
                                            <option value="April">April</option>
                                            <option value="May">May</option>
                                            <option value="June">June</option>
                                            <option value="July">July</option>
                                            <option value="August">August</option>
                                            <option value="September">September</option>
                                            <option value="October">October</option>
                                            <option value="November">November</option>
                                            <option value="December">December</option>
                                        </select>
                                        <select name="value" id="year" class="col-md-4 custom-select d-none">
                                            <option value="">Select Year</option>
                                            <option value="2019">2019</option>
                                            <option value="2020">2020</option>
                                            <option value="2021">2021</option>
                                            <option value="2022">2022</option>
                                            <option value="2023">2023</option>
                                            <option value="2024">2024</option>
                                            <option value="2025">2025</option>
                                            <option value="2026">2026</option>
                                            <option value="2027">2027</option>
                                            <option value="2028">2028</option>
                                            <option value="2029">2029</option>
                                            <option value="2030">2030</option>
                                        </select>
                                        <select name="value" id="payment" class="col-md-4 custom-select d-none">
                                            <option value="">Select Payment</option>
                                            <option value="Paid">Paid</option>
                                            <option value="Due">Due</option>
                                            <option value="Partial">Partial</option>
                                        </select>
                                        <input type="hidden" name="id" class="form-control" id="id" value="{{$shop->id}}">
                                    </div>
                                    @else
                                        <div class="form-group row col-md-7 ml-auto">
                                            <label for="search" class="col-md-3 col-form-label">Search By Field</label>
                                            <select name="field" id="field" class="col-md-4 custom-select">
                                                <option value="month">Month</option>
                                                <option value="year">Year</option>
                                                <option value="payment_status">Payment</option>
                                            </select>

                                            <select name="value" id="month" class="col-md-4 custom-select">
                                                <option value="">Select Month</option>
                                                <option value="January">January</option>
                                                <option value="February">February</option>
                                                <option value="March">March</option>
                                                <option value="April">April</option>
                                                <option value="May">May</option>
                                                <option value="June">June</option>
                                                <option value="July">July</option>
                                                <option value="August">August</option>
                                                <option value="September">September</option>
                                                <option value="October">October</option>
                                                <option value="November">November</option>
                                                <option value="December">December</option>
                                            </select>
                                            <select name="value" id="year" class="col-md-4 custom-select d-none">
                                                <option value="">Select Year</option>
                                                <option value="2019">2019</option>
                                                <option value="2020">2020</option>
                                                <option value="2021">2021</option>
                                                <option value="2022">2022</option>
                                                <option value="2023">2023</option>
                                                <option value="2024">2024</option>
                                                <option value="2025">2025</option>
                                                <option value="2026">2026</option>
                                                <option value="2027">2027</option>
                                                <option value="2028">2028</option>
                                                <option value="2029">2029</option>
                                                <option value="2030">2030</option>
                                            </select>
                                            <select name="value" id="payment" class="col-md-4 custom-select d-none">
                                                <option value="">Select Payment</option>
                                                <option value="Paid">Paid</option>
                                                <option value="Due">Due</option>
                                                <option value="Partial">Partial</option>
                                            </select>
                                            <input type="hidden" name="id" class="form-control" id="id" value="{{$shop->id}}">
                                        </div>
                                        @endif

                                    @if(Auth::user()->role == 'super' || Auth::user()->role == 'admin')
                                        <div class="col-md-1">
                                            <a href="{{route('addBill',['id' => $shop->id])}}" class="btn btn-primary">
                                                <i class="fa fa-plus" aria-hidden="true"></i>
                                                <span>Add Bill</span>
                                            </a>
                                        </div>
                                     @endif
                                </div>
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            <div class="card-body">
                                <table id="mytable" class="table table-bordered table-striped text-center">
                                    <thead>
                                    <tr class="">
                                        <th width="5%">Month</th>
                                        <th width="5%">Year</th>
                                        <th width="5%">Current Unit</th>
                                        <th width="5%">Previous Unit</th>
                                        <th width="5%">Used Unit</th>
                                        <th width="5%">Previous Due</th>
                                        <th width="5%">Additional Fee</th>
                                        <th width="5%">Total Amount</th>
                                        <th width="5%">Paid Amount</th>
                                        <th width="5%">Due Amount</th>
                                        <th width="5%">Payment</th>
                                        @if(Auth::user()->role == 'super' || Auth::user()->role == 'admin')
                                        <th width="45%">Action</th>
                                        @else
                                        <th width="10%">Action</th>
                                        @endif
                                    </tr>
                                    </thead>
                                <tbody id="normal">

                                @if($bills->count() > 0)

                                     @foreach($bills as $bill)
                                    <tr class="text-bold text-secondary">
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
                                        <td>
                                            <a href="{{route('viewBill',['id' => $bill->id])}}" class="btn-sm btn-primary mr-1">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            @if(Auth::user()->role == 'super' || Auth::user()->role == 'admin')
                                            <a href="{{route('editBill',['id' => $bill->id])}}" class="btn-sm btn-success mr-1">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{route('deleteBill',['id' => $bill->id])}}" onclick="return confirm('Are You Sure!')" class="btn-sm btn-danger">
                                                <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                            </a>
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
                            @if(Auth::user()->role != 'visitor')
                                <div class="ml-auto mr-4" id="billLink">
                                    {{ $bills->links() }}
                                </div>
                            @endif

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
    <script type="text/javascript">
        $(document).ready(function() {
            $("#field").on("change", function () {
                if ($('#field').val() == 'month')
                {
                    $('#month').show();
                    $('#year').addClass('d-none');
                    $('#payment').addClass('d-none');
                }
                else if ($('#field').val() == 'year')
                {
                    $('#month').hide();
                    $('#year').removeClass('d-none');
                    $('#payment').addClass('d-none');
                }
                else
                {
                    $('#month').hide();
                    $('#year').addClass('d-none');
                    $('#payment').removeClass('d-none');
                }
            })

            $("#month").on("change", function () {
                var search = $('#month').val();
                var field = $('#field').val();
                var id = $('#id').val();
                if(search && field)
                {
                    $('#normal').hide();
                    $('#billLink').hide();
                    $('#success').show();
                }
                else
                {
                    $('#success').hide();
                    $('#normal').show();
                    $('#billLink').show();
                }
                $.ajax({
                    type: "POST",
                    url: '{{URL::to("/billSearch")}}',
                    data: {
                        search: search,
                        field: field,
                        id : id,
                        _token: '{{csrf_token()}}',
                    },
                    dataType: 'html',

                    success: function (response) {
                        $('#success').html(response);

                    }
                });
            })
            $("#year").on("change", function () {
                var search = $('#year').val();
                var field = $('#field').val();
                var id = $('#id').val();
                if(search && field)
                {
                    $('#normal').hide();
                    $('#billLink').hide();
                    $('#success').show();
                }
                else
                {
                    $('#success').hide();
                    $('#normal').show();
                    $('#billLink').show();
                }
                $.ajax({
                    type: "POST",
                    url: '{{URL::to("/billSearch")}}',
                    data: {
                        search: search,
                        field: field,
                        id : id,
                        _token: '{{csrf_token()}}',
                    },
                    dataType: 'html',

                    success: function (response) {
                        $('#success').html(response);

                    }
                });
            })
            $("#payment").on("change", function () {
                var search = $('#payment').val();
                var field = $('#field').val();
                var id = $('#id').val();
                if(search && field)
                {
                    $('#normal').hide();
                    $('#billLink').hide();
                    $('#success').show();
                }
                else
                {
                    $('#success').hide();
                    $('#normal').show();
                    $('#billLink').show();
                }
                $.ajax({
                    type: "POST",
                    url: '{{URL::to("/billSearch")}}',
                    data: {
                        search: search,
                        field: field,
                        id : id,
                        _token: '{{csrf_token()}}',
                    },
                    dataType: 'html',

                    success: function (response) {
                        $('#success').html(response);

                    }
                });
            })
        })
    </script>
@endpush
