<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <!--[if IE]>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <![endif]-->
    <title>Monthly Bill History</title>
    <!-- BOOTSTRAP CORE STYLE  -->
    <link href="assets/css/bootstrap.css" rel="stylesheet" />
    <!-- CUSTOM STYLE  -->
    <link href="assets/css/custom-style.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <!-- GOOGLE FONTS -->
    <style>

    </style>

</head>
<body>
<section class="content">
    <div class="container-fluid">
        <div class="row">
            <!-- left column -->
            <div class="col-md-12">
                <div class="text-center text-bold">
                    <h3>BAITUS SALAH MASJID MARKET COMPLEX</h3>
                    <h5>({{$month}} - {{$year}}) Electric Bill Details</h5>
                    @if($floor == 1)
                    <h4>GROUND FLOOR</h4>
                    @else
                    <h4>SECOND FLOOR</h4>
                    @endif
                    <hr class="bg-dark">
                </div>
                        <table id="mytable" class="table table-bordered table-striped text-center">
                            <thead>
                            <tr class="">
                                <th>Shop No.</th>
                                <th>Current Unit</th>
                                <th>Previous Unit</th>
                                <th>Used Unit</th>
                                <th>Unit Rate</th>
                                <th>Previous Due</th>
                                <th>Additional Fee</th>
                                <th>Total Amount</th>
                                <th>Paid Amount</th>
                                <th>Due Amount</th>
                            </tr>
                            </thead>
                            <tbody id="normal">

                            @if($monthlyBill->count() > 0)

                                @foreach($monthlyBill as $bill)
                                    <tr class="text-bold text-secondary">
                                        <td>{{$bill->shop->shop_no}}</td>
                                        <td>{{$bill->current_unit}}</td>
                                        <td>{{$bill->previous_unit}}</td>
                                        <td>{{$bill->used_unit}}</td>
                                        <td>{{$bill->unit_rate}}</td>
                                        <td>{{$bill->previous_due}}</td>
                                        <td>{{$bill->additional_fee}}</td>
                                        <td>{{$bill->total_amount}}</td>
                                        <td>{{$bill->paid_amount}}</td>
                                        <td>{{$bill->due_amount}}</td>
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

                        <hr class="bg-dark">

                        <div class="row">
                            <div class="col-md-4 text-left text-bold"><h5>Grand Total : {{$total}}</h5></div>
                            <div class="col-md-4 text-center text-bold"><h5>Total Paid : {{$paid}}</h5></div>
                            <div class="col-md-4 text-right text-bold"><h5>Total Due :{{$due}}</h5></div>
                        </div>

                    </div>

                    <!-- /.card -->

                </div>
                <!--/.col (left) -->
                <!-- right column -->
                <!--/.col (right) -->
            </div>
            <!-- /.row -->
</section>
</body>
</html>

