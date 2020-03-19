@extends('admin.master')

@section('title', 'MMC|| Shop Details')

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
                            <li class="breadcrumb-item active text-bold text-muted">Shop</li>
                            <li class="breadcrumb-item active">Shop Details</li>
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
                                    SHOP INFORMATION
                                </div>
                                <div class="card-body">

                                        <div class="col-md-12 col-lg-12">
                                            <img class="img-circle mx-auto d-block"
                                                 src="{{$showShop->image}}"
                                                 alt="User Pic">
                                        </div>
                                        <div class=" col-md-12 col-lg-12">
                                            <table class="table table-striped mt-3">
                                                <tbody>
                                                <tr>
                                                    <td class="text-bold text-muted">Shop No:</td>
                                                    <td class="text-bold">{{$showShop->shop_no}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold text-muted">Floor</td>
                                                    <td class="text-bold">{{$showShop->floor}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold text-muted">Shop ID:</td>
                                                    <td class="text-bold">{{$showShop->shop_id}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold text-muted">Shop Name</td>
                                                    <td class="text-bold">{{$showShop->shop_name}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold text-muted">Shop Owner:</td>
                                                    <td class="text-bold">{{$showShop->shop_owner}}</td>

                                                </tr>
                                                <tr>
                                                    <td class="text-bold text-muted">Owner Address:</td>
                                                    <td class="text-bold">{{$showShop->owner_address}}</td>

                                                </tr>
                                                <tr>
                                                    <td class="text-bold text-muted">Owner Contact</td>
                                                    <td class="text-bold">{{$showShop->owner_contact}}</td>

                                                </tr>
                                                <tr>
                                                    <td class="text-bold text-muted">Shop Status:</td>
                                                    @if($showShop->status == 0)
                                                        <td class="text-bold">{{'Closed'}}</td>
                                                    @else($showUser->role == 1)
                                                        <td class="text-bold">{{'Open'}}</td>
                                                    @endif
                                                </tr>
                                                <tr>
                                                    <td class="text-bold text-muted">Registered Since:</td>
                                                    <td class="text-bold">{{$showShop->created_at}}</td>
                                                </tr>
                                                <tr>
                                                    <td class="text-bold text-muted">Last Edited:</td>
                                                    <td class="text-bold">{{$showShop->updated_at}}</td>
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
        </section>
    </div>
@endsection

@push('js')

@endpush

