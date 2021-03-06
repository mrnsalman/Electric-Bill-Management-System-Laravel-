@extends('admin.master')

@section('title', 'MMC|| My Profile')

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
                            <li class="breadcrumb-item active text-bold text-muted">Profile</li>
                            <li class="breadcrumb-item active">My Profile</li>
                        </ol>
                    </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="offset-2 col-md-8">
                            <div class="card card-default">
                                <div class="card-header text-muted text-bold">
                                    PROFILE INFORMATION
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-5 col-lg-5">
                                            <img class="img-fluid"
                                                 src="{{Auth::user()->image}}"
                                                 alt="User Pic">
                                        </div>
                                        <div class=" col-md-7 col-lg-7">
                                            <table class="table table-user-information">
                                                <tbody>
                                                <tr>
                                                    <td class="text-bold text-muted">User Name:</td>
                                                    <td class="text-bold">{{Auth::user()->username}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold text-muted">Full Name</td>
                                                    <td class="text-bold">{{Auth::user()->fullName}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold text-muted">Email</td>
                                                    <td class="text-bold">{{Auth::user()->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold text-muted">User level:</td>
                                                    @if(Auth::user()->role == 'super')
                                                        <td class="text-bold">{{'Super Admin'}}</td>
                                                    @elseif(Auth::user()->role == 'admin')
                                                        <td class="text-bold">{{'Admin'}}</td>
                                                    @else
                                                        <td class="text-bold">{{'Visitor'}}</td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td class="text-bold text-muted">Registered since:</td>
                                                    <td class="text-bold">{{Auth::user()->created_at}}</td>
                                                </tr>
                                                </tbody>
                                            </table>
                                        </div>
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



