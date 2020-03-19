@extends('admin.master')

@section('title', 'MMC|| Bill Details')

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
                            <li class="breadcrumb-item active text-bold text-muted">Bill</li>
                            <li class="breadcrumb-item active">Bill Details</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="offset-1 col-md-10">
                            <div class="mb-2 text-right">
                                <a href="{{route('invoiceBill',['id' => $showBill->id])}}" class="btn btn-primary">
                                    <i class="fa fa-file-invoice"></i>
                                    <span class="text-bold">Print</span>
                                </a>
                            </div>
                            <div class="card card-default">
                                <div class="col-lg-11 col-md-11 col-sm-11" style="font-family: verdana; font-size:11px;margin:0px;padding:0px; background:url('/images/dpdc-t.png') no-repeat center 380px;margin-top: 30px;">
                                    <div style="width: 98%;background-color: #fff; opacity: .9;margin-left: 5px;">


                                        <table style="margin:30px 0px 2px 20px; color:#257590;" width="100%" cellpadding="0" cellspacing="0">

                                            <tr>
                                                <td width="25%">
                                                </td>
                                                <td style="text-align:center;color:#3B93C9;" width="50%">
                                                    <div style="font-size:13px; font-weight: bold; padding-bottom: 10px">BAITUS SALAH JAM-E-MASJID.</div>
                                                    <div style="font-size:11px;padding-bottom: 10px">
                                                        Masjid Market Committee
                                                    </div>
                                                    <div style="font-size:10px;padding-bottom: 15px">Tikkapara, Ring Road, Mohammadpur, Dhaka-1207</div>


                                                    <div style="text-align:center;color:#0F82C8;margin-bottom: 0px;font-size: 13px;padding-bottom: 10px;"><b>ELECTRICITY BILL</b><br/>

                                                    </div>
                                                </td>
                                                <!--<td style="color:#696957;" width="11%">

                                                </td>-->
                                                <td style="vertical-align: top; text-align:right; font-size: 13px;font-family: 'Times New Roman';" width="24%">CUSTOMER COPY

                                                </td>
                                            </tr>

                                        </table>

                                        <div style="color:#257590; vertical-align: top; text-align:right; font-size: 13px;font-family: 'Times New Roman';margin-bottom: 5px">BILL ID : <span style="color:#696957;">{{$showBill->bill_id}}</span></div>

                                        <table style="border:1px solid #4d99b3;margin:0px 0px 2px 20px;color:#257590;width:100%;font-size:12px;" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="padding:4px 10px;vertical-align: top;" width="50%">

                                                    <div style="color:#696957;">{{$showBill->shop->shop_owner}}</div><br>

                                                    <div style="color:#696957;">

                                                        <div>{{$showBill->shop->owner_address}}</div><br>

                                                    </div>

                                                    <div style="color:#696957;">

                                                        <div>{{$showBill->shop->owner_contact}}</div>

                                                    </div>


                                                </td>
                                                <td style="border-left: 1px solid #4d99b3;padding: 0px;">
                                                    <table style="width:100%;" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td style="background-color:#cceeff;padding:10px;border-bottom:1px solid #4d99b3;border-right:1px solid #4d99b3;border-top:1px solid #4d99b3;text-align: center;"> MONTH</td>
                                                            <td style="background-color:#cceeff;padding:10px;border-bottom:1px solid #4d99b3;border-right:1px solid #4d99b3;border-top:1px solid #4d99b3;text-align: center;" colspan="2">YEAR</td>
                                                            <td style="background-color:#ffcccc;padding:10px;border-bottom:1px solid #4d99b3;border-right:1px solid #4d99b3;border-top:1px solid #4d99b3;text-align: center;">ISSUE DATE</td>

                                                        </tr>

                                                        <tr>
                                                            <td style="text-align: center; padding: 8px;color:#696957;">
                                                                {{$showBill->month}}
                                                            </td>
                                                            <td colspan="2" style="text-align: center;color:#696957;">{{$showBill->year}}</td>
                                                            <td style="text-align: center;color:#696957;">{{date('d/m/Y', strtotime($showBill->created_at))}}</td>

                                                        </tr>

                                                        <tr>
                                                            <td style="padding:10px;border:1px solid #4d99b3;border-left:0px;text-align: center;"> SHOP NO.</td>
                                                            <td style="padding:1px 5px 1px 5px;border:1px solid #4d99b3;border-left:0px;text-align: center;" colspan="2">SHOP NAME</td>
                                                            <td style="padding:1px 5px 1px 5px;border:1px solid #4d99b3;border-left:0px;border-bottom:1px solid #4d99b3;text-align: center; background-color: #ffcccc;">LAST PAY DATE</td>

                                                        </tr>

                                                        <tr>
                                                            <td style="text-align: center;padding: 8px;color:#696957;">{{$showBill->shop->shop_no}}</td>
                                                            <td colspan="2" style="text-align: center;color:#696957;">{{$showBill->shop->shop_name}}</td>
                                                            <td style="text-align: center;color:#696957;">{{$showBill->last_date}}</td>

                                                        </tr>

                                                    </table>
                                                </td>
                                            </tr>
                                        </table>

                                        <table style="border:1px solid #4d99b3;margin:0px 0px 2px 20px;color:#257590;width:100%;font-size:12px;" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="background-color:#CCEEFF;padding-left:5px;padding-right:5px;padding-top:5px;padding-bottom:5px;border-left: 1px solid #4d99b3; vertical-align:top; ">


                                                    <div style="padding-bottom: 5px">CURRENT RDG</div>
                                                    <div style="padding-bottom: 5px">PREVIOUS RDG</div>
                                                    <div style="padding-bottom: 5px">CONSUMED UNIT</div>

                                                </td>
                                                <td style="border-left: 1px solid #4d99b3;color:#696957;vertical-align: top;padding-left:87px;padding-right:5px;padding-top:5px;padding-bottom:5px;">

					<span style="width:100%;display: inline-block;text-align: right">
					      <div style="padding-bottom: 5px">{{$showBill->current_unit}}</div>
					      <div style="padding-bottom: 5px">{{$showBill->previous_unit}}</div>
					       <div style="padding-bottom: 5px">{{$showBill->used_unit}}</div>
					</span>


                                                </td>


                                            </tr>
                                        </table>
                                        <table style="border:1px solid #4d99b3;margin:0px 0px 2px 20px;color:#257590;width:100%;font-size:12px;" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td width="94%">
                                                    <table style="color:#257590;width:100%;" cellpadding="0" cellspacing="0">
                                                        <thead>
                                                        <tr>
                                                            <th style="background-color:#CCEEFF;border-left:1px solid #4d99b3;border-top:1px solid #4d99b3; padding:10px;" width="35%"><b>CURRENT CHARGES</b></th>
                                                            <th style="border-left:1px solid #4d99b3;border-top:1px solid #4d99b3;background-color:#CCEEFF; padding:4px;text-align: center;" width="15%"><b>TAKA</b></th>
                                                            <th style="border-left:1px solid #4d99b3;border-top:1px solid #4d99b3;background-color:#CCEEFF; padding:4px;text-align: center;" width="35%"><b>ADDITIONA CHARGES</b></th>
                                                            <th style="border-left:1px solid #4d99b3;border-right:1px solid #4d99b3;border-top:1px solid #4d99b3;background-color:#CCEEFF; padding:4px;text-align: center;" width="15%"><b>TAKA</b></th>

                                                        </tr>
                                                        </thead>
                                                        <tbody>
                                                        <tr>
                                                            <td style="border-top:1px solid #4d99b3;padding:5px; vertical-align: top; text-align: left;width: 15%;">
                                                                <div style="padding-bottom: 5px">UNIT RATE</div>
                                                                <div style="padding-bottom: 5px">EXCLUDING FEE</div>
                                                                <div style="padding-bottom: 5px">EXCLUDING DUE</div>
                                                                <br>
                                                                <div style="padding-bottom: 5px">PAYMENT STATUS</div>
                                                            </td>
                                                            <td style="border-top:1px solid #4d99b3;border-left:1px solid #4d99b3;color:#696957;padding:4px;vertical-align: top;text-align: right;width: 15%;">

                                                                <div style="padding-bottom: 5px">        {{$showBill->unit_rate}}.00</div>
                                                                <div style="padding-bottom: 5px">          {{$showBill->exclude_fee}}.00</div>
                                                                <div style="padding-bottom: 5px">           {{$showBill->exclude_due}}.00</div>
                                                                <br>
                                                                <div style="padding-bottom: 5px">           {{$showBill->payment_status}}</div>

                                                            </td>
                                                            <td style="border-top:1px solid #4d99b3;border-left:1px solid #4d99b3;padding:0px;vertical-align: top;text-align: left;width: 35%;">

                                                                <table cellpadding="0" cellspacing="0" width="100%">
                                                                    <tr>
                                                                        <td style="border-bottom:1px solid #4d99b3; padding:5px;">
                                                                            <div style="padding-bottom: 5px">PREVIOUS DUE</div>
                                                                            <div style="padding-bottom: 5px">ADDITIONAL FEE</div>
                                                                            <div style="padding-bottom: 17px"></div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-top:1px solid #4d99b3;border-bottom:1px solid #4d99b3;border-right:1px solid #4d99b3;border-left:0px solid #4d99b3;padding:4px;vertical-align: top;background-color: #FFCCCC;text-align: left;">

                                                                            <div style="padding: 5px"><b>TOTAL AMOUNT TO BE PAID</b></div>

                                                                        </td>

                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-top:1px solid #4d99b3;border-bottom:1px solid #4d99b3;border-right:1px solid #4d99b3;border-left:0px solid #4d99b3;padding:4px;vertical-align: top; background-color: #CCF2FF;text-align: left;">

                                                                            <div style="padding: 5px"><b>AFTER LAST PAY DATE</b></div>

                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>
                                                            <td style="border-top:1px solid #4d99b3;border-left: 1px solid #4d99b3;vertical-align: top; text-align: right;">
                                                                <table cellpadding="0" cellspacing="0" width="100%">
                                                                    <tr>
                                                                        <td style="border-bottom:1px solid #4d99b3; color:#696957; padding:5px;text-align: right;">
                                                                            <div style="padding-bottom: 5px">{{$showBill->previous_due}}.00</div>
                                                                            <div style="padding-bottom: 5px">{{$showBill->additional_fee}}.00</div>
                                                                            <div style="padding-bottom: 17px"></div>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-top:1px solid #4d99b3;border-right:1px solid #4d99b3;border-left:1px solid #4d99b3;padding:4px;vertical-align: top;background-color: #FFCCCC; text-align: right;color:#696957;">

                                                                            <div style="padding: 5px">{{$showBill->total_amount}}.00</div>
                                                                        </td>
                                                                    </tr>
                                                                    <tr>
                                                                        <td style="border-top:1px solid #4d99b3;border-right:1px solid #4d99b3;border-left:1px solid #4d99b3;padding:4px;vertical-align: top;background-color: #CCF2FF;text-align:right;color:#696957;">
                                                                            <div style="padding: 5px">{{$showBill->after_date}}.00</div>
                                                                        </td>
                                                                    </tr>
                                                                </table>
                                                            </td>

                                                        </tr>


                                                        </tbody>
                                                    </table>
                                                </td>

                                            </tr>
                                        </table>

                                        <table style="border:1px solid #4d99b3;margin:0px 0px 2px 20px;color:#257590;width:100%;font-size:12px;" cellpadding="0" cellspacing="0">

                                            <tr  style="">
                                                <td colspan="4" style="background-color: #F6C9C9;color: #696957; border-top:1px solid #4d99b3;padding-left: 20px;">&nbsp;</td>

                                                <td colspan="2" style="background-color: #F6C9C9;color: #696957; border-top:1px solid #4d99b3;color:#696957;padding-left: 16px;">&nbsp;</td>
                                            </tr>
                                            <tr>
                                                <td colspan="6" style="background-color: #F6C9C9;height: 4px;"></td>
                                            </tr>
                                        </table>

                                        <table style="border:1px solid #4d99b3;margin:0px 0px 2px 20px;color:#257590; width:100%;font-size:12px;" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="background-color:#ccf2ff;border-right:1px solid #4d99b3;border-bottom:1px solid #4d99b3;width: 15%;padding: 6px 20px;text-align: right;vertical-align: top;font-size: 12px;">

                                                    <div style="padding-top: 5px"><b style="font-size: 14px;">PAY AT</b></div>

                                                </td>
                                                <td style="border-bottom:1px solid #4d99b3;vertical-align: top;">
                                                    <table style="font-size: 12px;" width="100%">
                                                        <tr>
                                                            <td  style="color:#696957;vertical-align: top;padding: 6px;">
                                                                <div style="padding-bottom: 5px">MOSJID MARKET COMMITTEE</div>
                                                                <div style="padding-bottom: 5px;padding-left: 40px">MAIN OFFICE</div>
                                                            </td>
                                                            <td style="width: 40%;padding-left: 15px;">
                                                                <div style="padding-bottom: 5px"><b>OFFICE ASSISTANCE</b></div>
                                                                <div style="padding-bottom: 5px"><span style="color:#696957;border-bottom: 1px dotted #4d99b3;text-transform: uppercase;">Md. MOZAMMEL HAQUE</span></div>
                                                            </td>
                                                            <td>
                                                                PHONE: <span style="color:#696957;">9577431</span>
                                                            </td>
                                                        </tr>
                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <table style="border-bottom:1px dashed #4d99b3;margin:0px 0px 0px 20px; width:100%;font-size:12px;" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>

                                        <p style="text-align:right;color:#047ea7;font-size: 10px;margin-bottom: 10px;margin-top: 10px"><b>OFFICE COPY</b></p>

                                        <div style="color:#257590; vertical-align: top; text-align:right; font-size: 13px;font-family: 'Times New Roman'; margin-bottom: 5px">BILL ID : <span style="color:#696957;">{{$showBill->bill_id}}</span></div>
                                        <table style="border:1px solid #4d99b3;margin:0px 0px 2px 20px;color:#257590;width:100%;font-size:12px;" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td style="background-color: #ccf2ff;padding: 8px; text-align: center; vertical-align: top;width:10%;border-bottom: 1px solid #4d99b3;border-right: 1px solid #4d99b3;">
                                                    <div style="padding-bottom: 15px">PAID</div>
                                                    <div style="padding-bottom: 35px">DATE</div>
                                                    <div>SIGNATURE</div>
                                                </td>
                                                <td style="width:20%;border-bottom: 1px solid #4d99b3;border-right: 1px solid #4d99b3;"></td>
                                                <td style="border-left: 1px solid #4d99b3;">
                                                    <table style="width:100%;" cellpadding="0" cellspacing="0">
                                                        <tr>
                                                            <td style="background-color:#cceeff;padding:10px;border-bottom:1px solid #4d99b3;border-right:1px solid #4d99b3;border-top:1px solid #4d99b3;border-left:1px solid #4d99b3;text-align: center;" width="20%"> MONTH</td>
                                                            <td style="background-color:#cceeff;padding:1px 14px 1px 14px;border-bottom:1px solid #4d99b3;border-right:1px solid #4d99b3;border-top:1px solid #4d99b3;text-align: center;" colspan="2" width="15%">YEAR</td>
                                                            <td style="background-color:#ffcccc;padding:1px 14px 1px 14px;border-bottom:1px solid #4d99b3;border-right:1px solid #4d99b3;border-top:1px solid #4d99b3;text-align: center;" width="30%">ISSUE DATE</td>
                                                            <td style="padding:1px 5px 1px 5px;border:1px solid #4d99b3;border-left:0px;border-top:1px solid #4d99b3;border-right:1px solid #4d99b3;text-align: center; background-color: #ffcccc;" width="50%">LAST DATE</td>
                                                        </tr>

                                                        <tr>
                                                            <td style="text-align: center; padding: 8px;color:#696957;border-left:0px;border-bottom: 0px;">
                                                                {{$showBill->month}}							</td>
                                                            <td colspan="2" style="text-align: center;color:#696957;border-left:0px;border-bottom: 0px;">{{$showBill->year}}</td>
                                                            <td style="text-align: center;color:#696957;border-left:0px;border-bottom: 0px;">{{date('d/m/Y', strtotime($showBill->created_at))}}</td>
                                                            <td style="text-align: center;color:#696957;border-left:0px;border-bottom: 0px;">{{$showBill->last_date}}</td>

                                                        </tr>

                                                        <tr>
                                                            <td style="padding:10px;border:1px solid #4d99b3;border-left:0px;text-align: center;" width="25%"> SHOP NO.</td>
                                                            <td style="padding:1px 5px 1px 5px;border:1px solid #4d99b3;border-left:0px;text-align: center;" colspan="2" width="25%">SHOP NAME</td>
                                                            <td style="padding:1px 5px 1px 5px;border:1px solid #4d99b3;border-left:0px;border-right: 0px;text-align: center; background-color: #ffcccc;border-right:1px solid #4d99b3;" width="15%">TOTAL</td>
                                                            <td style="padding:1px 5px 1px 5px;border:1px solid #4d99b3;border-left:0px;border-right:1px solid #4d99b3;text-align: center; background-color: #ffcccc;" width="20%">AFTER DATE </td>
                                                        </tr>

                                                        <tr>
                                                            <td style="text-align: center;padding: 8px;color:#696957;border-left:0px;border-bottom: 0px;">{{$showBill->shop->shop_no}}</td>
                                                            <td colspan="2" style="text-align: center;color:#696957;border-left:0px;border-bottom: 0px;">{{$showBill->shop->shop_name}}</td>
                                                            <td style="text-align: center;color:#696957;border-left:0px;border-bottom: 0px;">{{$showBill->total_amount}}.00</td>
                                                            <td style="text-align: center;color:#696957;border-left:0px;border-bottom: 0px;">{{$showBill->after_date}}.00</td>

                                                        </tr>

                                                    </table>
                                                </td>
                                            </tr>
                                        </table>
                                        <table style="border-bottom:1px dashed #4d99b3;margin:0px 0px 0px 20px; width:100%;font-size:12px;" cellpadding="0" cellspacing="0">
                                            <tr>
                                                <td>&nbsp;</td>
                                            </tr>
                                        </table>



                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('js')

@endpush
