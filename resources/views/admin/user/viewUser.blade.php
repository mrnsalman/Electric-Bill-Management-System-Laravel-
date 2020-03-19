@extends('admin.master')

@section('title', 'MMC|| User Profile')

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
                            <li class="breadcrumb-item active text-bold text-muted">User</li>
                            <li class="breadcrumb-item active">User Profile</li>
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
                                    USER INFORMATION
                                </div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col-md-5 col-lg-5">
                                            <img class="img-fluid"
                                                 src="{{$showUser->image}}"
                                                 alt="User Pic">
                                        </div>
                                        <div class=" col-md-7 col-lg-7">
                                            <table class="table table-user-information">
                                                <tbody>
                                                <tr>
                                                    <td class="text-bold text-muted">User Name:</td>
                                                    <td class="text-bold">{{$showUser->username}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold text-muted">Full Name:</td>
                                                    <td class="text-bold">{{$showUser->fullName}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold text-muted">Email:</td>
                                                    <td class="text-bold">{{$showUser->email}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold text-muted">User level:</td>
                                                    @if($showUser->role == 1)
                                                    <td class="text-bold">{{'Super Admin'}}</td>
                                                    @elseif($showUser->role == 2)
                                                    <td class="text-bold">{{'Admin'}}</td>
                                                    @else
                                                    <td class="text-bold">{{'Visitor'}}</td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td class="text-bold text-muted">Registered since:</td>
                                                    <td class="text-bold">{{$showUser->created_at}}</td>
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

