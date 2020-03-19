@extends('admin.master')

@section('title', 'MMC || Dashboard')

@push('css')
    <link href="{{ asset('css/style.css') }}" rel="stylesheet">
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb ml-auto">
                            @if(Auth::user()->role == 'super')
                            <li class="breadcrumb-item active text-muted text-bold">Super Admin</li>
                            <li class="breadcrumb-item active">Dashboard</li>
                            @elseif(Auth::user()->role == 'admin')
                            <li class="breadcrumb-item active text-muted text-bold">Admin</li>
                            <li class="breadcrumb-item active">Dashboard</li>
                            @else
                            <li class="breadcrumb-item active text-muted text-bold">Visitor</li>
                            <li class="breadcrumb-item active">Dashboard</li>
                            @endif
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->

        <!-- Main content -->
        <section class="content">
            <div class="container-fluid">
                <!-- Small boxes (Stat box) -->
                @if(Auth::user()->role == 'super')
                <div class="row">
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-info">
                            <div class="inner">
                                <h3>{{$total_users}}</h3>

                                <p>Total Users</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-bag"></i>
                            </div>
                            <div class="small-box-footer">
                                User Data
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-success">
                            <div class="inner">
                                <h3>{{$superAdmins}}</h3>

                                <p>Super Admins</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-stats-bars"></i>
                            </div>
                            <div class="small-box-footer">
                                User Data
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-danger">
                            <div class="inner">
                                <h3>{{$admins}}</h3>

                                <p>Admins</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-pie-graph"></i>
                            </div>
                            <div class="small-box-footer">
                                User Data
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                    <div class="col-lg-3 col-6">
                        <!-- small box -->
                        <div class="small-box bg-warning-gradient">
                            <div class="inner text-white">
                                <h3>{{$visitors}}</h3>

                                <p>Visitors</p>
                            </div>
                            <div class="icon">
                                <i class="ion ion-person-add"></i>
                            </div>
                            <div class="small-box-footer">
                                User Data
                            </div>
                        </div>
                    </div>
                    <!-- ./col -->
                </div>
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info-gradient">
                                <div class="inner">
                                    <h3>{{$first_floor_active_shops}}</h3>

                                    <p>Active Shops</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <div class="small-box-footer">
                                    First Floor
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success-gradient">
                                <div class="inner">
                                    <h3>{{$first_floor_inactive_shops}}</h3>

                                    <p>Inactive Shops</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <div class="small-box-footer">
                                    First Floor
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger-gradient">
                                <div class="inner">
                                    <h3>{{$second_floor_active_shops}}</h3>

                                    <p>Active Shops</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <div class="small-box-footer">
                                    Second Floor
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning-gradient">
                                <div class="inner text-white">
                                    <h3>{{$second_floor_inactive_shops}}</h3>

                                    <p>Inactive Shops</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <div class="small-box-footer">
                                    Second Floor
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                    </div>
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info-gradient">
                                <div class="inner">
                                    <h3>{{$total_shops}}</h3>

                                    <p>Total Shops</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <div class="small-box-footer">
                                    Shop Data
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success-gradient">
                                <div class="inner">
                                    <h3>{{$current_month_total}}</h3>

                                    <p>Total Payment</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <div class="small-box-footer">
                                    {{$current_month}}
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger-gradient">
                                <div class="inner">
                                    <h3>{{$current_month_paid}}</h3>

                                    <p>Paid Amount</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <div class="small-box-footer">
                                    {{$current_month}}
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning-gradient">
                                <div class="inner text-white">
                                    <h3>{{$current_month_due}}</h3>

                                    <p>Due Payment</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <div class="small-box-footer">
                                    {{$current_month}}
                                </div>
                            </div>
                        </div>
                @elseif(Auth::user()->role == 'admin')
                            <div class="row">
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-info-gradient">
                                        <div class="inner">
                                            <h3>{{$first_floor_active_shops}}</h3>

                                            <p>Active Shops</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-bag"></i>
                                        </div>
                                        <div class="small-box-footer">
                                            First Floor
                                        </div>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-success-gradient">
                                        <div class="inner">
                                            <h3>{{$first_floor_inactive_shops}}</h3>

                                            <p>Inactive Shops</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-stats-bars"></i>
                                        </div>
                                        <div class="small-box-footer">
                                            First Floor
                                        </div>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-danger-gradient">
                                        <div class="inner">
                                            <h3>{{$second_floor_active_shops}}</h3>

                                            <p>Active Shops</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-pie-graph"></i>
                                        </div>
                                        <div class="small-box-footer">
                                            Second Floor
                                        </div>
                                    </div>
                                </div>
                                <!-- ./col -->
                                <div class="col-lg-3 col-6">
                                    <!-- small box -->
                                    <div class="small-box bg-warning-gradient">
                                        <div class="inner text-white">
                                            <h3>{{$second_floor_inactive_shops}}</h3>

                                            <p>Inactive Shops</p>
                                        </div>
                                        <div class="icon">
                                            <i class="ion ion-person-add"></i>
                                        </div>
                                        <div class="small-box-footer">
                                            Second Floor
                                        </div>
                                    </div>
                                </div>
                                <!-- ./col -->
                            </div>
                <div class="content" style="height: 280px">
                    <div class="row">
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-info-gradient">
                                <div class="inner">
                                    <h3>{{$total_shops}}</h3>

                                    <p>Total Shops</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-bag"></i>
                                </div>
                                <div class="small-box-footer">
                                    Shop Data
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-success-gradient">
                                <div class="inner">
                                    <h3>{{$current_month_total}}</h3>

                                    <p>Total Payment</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-stats-bars"></i>
                                </div>
                                <div class="small-box-footer">
                                    {{$current_month}}
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-danger-gradient">
                                <div class="inner">
                                    <h3>{{$current_month_paid}}</h3>

                                    <p>Paid Amount</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-pie-graph"></i>
                                </div>
                                <div class="small-box-footer">
                                    {{$current_month}}
                                </div>
                            </div>
                        </div>
                        <!-- ./col -->
                        <div class="col-lg-3 col-6">
                            <!-- small box -->
                            <div class="small-box bg-warning-gradient">
                                <div class="inner text-white">
                                    <h3>{{$current_month_due}}</h3>

                                    <p>Due Payment</p>
                                </div>
                                <div class="icon">
                                    <i class="ion ion-person-add"></i>
                                </div>
                                <div class="small-box-footer">
                                    {{$current_month}}
                                </div>
                            </div>
                        </div>
                </div>
                    @else
                     <div class="content" style="height: 430px">
                      <div class="container-fluid">
                          <div class="row">
                        <div class="card text-center offset-1 col-md-10">
                            <div class="card-header text-bold bg-success">
                                BAITUS SALAH JAM-E-MASJID
                            </div>
                            <div class="card-body">
                                <img src="{{Auth::user()->image}}" alt="" style="width: 150px;height: 150px">
                                <h5 class="card-title mt-3">Welcome, {{Auth::user()->fullName}}</h5>
                                <p class="card-text">Now you can see your shops, shop bills and can print any bill paper for any month from our system</p>
                                <h5 class="card-title">Thank You..</h5>
                            </div>
                            <div class="card-footer text-bold bg-success">
                                Electric Bill Management System
                            </div>
                        </div>
                     </div>
                      </div>
                     </div>
                    @endif
            </div>
         </div>
        </section>
        <!-- /.content -->
    </div>
@endsection

@push('js')

@endpush

