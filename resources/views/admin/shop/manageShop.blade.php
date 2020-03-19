@extends('admin.master')

@section('title', 'MMC || Manage Shop')



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
                        <li class="breadcrumb-item active text-muted text-bold">Shop</li>
                        <li class="breadcrumb-item active">Manage Shops</li>
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
                                <div class="col-md-4 mt-2 text-muted text-bold">ALL SHOPS</div>
                                <div class="form-group row col-md-8 ml-auto">
                                    <label for="search" class="col-md-3 col-form-label">Search By Field</label>
                                    <select name="field" id="field" class="col-md-3 custom-select">
                                        <option value="shop_no">Shop No</option>
                                        <option value="floor">Floor</option>
                                        <option value="shop_name">Shop Name</option>
                                        <option value="shop_owner">Shop Owner</option>
                                        <option value="owner_contact">Owner Contact</option>
                                        <option value="status">Shop Status</option>
                                    </select>
                                    <div class="col-md-6">
                                        <input type="search" onkeyup="search()" name="search" class="form-control" id="search" placeholder="Search any user here..">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- /.card-header -->
                        <!-- form start -->
                        <div class="card-body">
                            <table id="mytable" class="table table-bordered table-striped text-center">
                                <thead>
                                    <tr class="">
                                        <th>Shop No.</th>
                                        <th>Floor</th>
                                        <th width="17%">Shop Name</th>
                                        <th width="17%">Shop Owner</th>
                                        <th width="17%">Owner Contact</th>
                                        <th>Image</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody id="normal">

                                @if($shops->count() > 0)

                                    @foreach($shops as $shop)
                                    <tr class="text-bold text-secondary">
                                        <td>{{$shop->shop_no}}</td>
                                        <td>{{$shop->floor}}</td>
                                        <td>{{$shop->shop_name}}</td>
                                        <td>{{$shop->shop_owner}}</td>
                                        <td>123456789</td>
                                        <td><img src="{{$shop->image}}" alt="userImage" style="width: 50px;height: 50px;border-radius: 50%"></td>
                                        <td>
                                            @if(Auth::user()->role == 'super')
                                            @if($shop->status == 2)
                                            <a href="{{route('statusChange',['id' => $shop->id])}}" class="btn btn-dark">
                                                <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                                            </a>
                                            @else
                                            <a href="{{route('statusChange',['id' => $shop->id])}}" class="btn btn-warning">
                                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                            </a>
                                            @endif
                                            @else
                                            @if($shop->status == 2)
                                            <a href="{{route('statusChange',['id' => $shop->id])}}" class="btn btn-dark disabled">
                                                <i class="fa fa-arrow-circle-down" aria-hidden="true"></i>
                                            </a>
                                            @else
                                            <a href="{{route('statusChange',['id' => $shop->id])}}" class="btn btn-warning disabled">
                                                <i class="fa fa-arrow-circle-up" aria-hidden="true"></i>
                                            </a>
                                            @endif
                                            @endif
                                        </td>
                                        <td>
                                            <a href="{{route('viewShop',['id' => $shop->id])}}" class="btn btn-primary">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            @if($shop->status == 1)
                                            <a href="{{route('manageBill',['id' => $shop->id])}}" class="btn btn-secondary">
                                                <i class="fa fa-list" aria-hidden="true"></i>
                                            </a>
                                            @else
                                            <a href="{{route('addBill',['id' => $shop->id])}}" class="btn btn-secondary disabled">
                                                <i class="fa fa-list" aria-hidden="true"></i>
                                            </a>
                                            @endif
                                            <a href="{{route('editShop',['id' => $shop->id])}}" class="btn btn-success">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{route('deleteShop',['id' => $shop->id])}}" onclick="return confirm('Are You Sure!')" class="btn btn-danger">
                                                <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @endforeach

                                    @else
                                        <tr>
                                            <td colspan="11">
                                                <span class="text-bold text-danger">No shop found in the system..!!</span>
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
                        <div class="ml-auto mr-4" id="shopLink">
                            {{ $shops->links() }}
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
    function search() {
        var search = $('#search').val();
        var field = $('#field').val();
        if (search && field) {
            $('#normal').hide();
            $('#shopLink').hide();
            $('#success').show();
        } else {
            $('#success').hide();
            $('#normal').show();
            $('#shopLink').show();
        }
        $.ajax({
            type: "POST",
            url: '{{URL::to("/shopSearch")}}',
            data: {
                search: search,
                field: field,
                _token: '{{csrf_token()}}',
            },
            dataType: 'html',

            success: function(response) {
                $('#success').html(response);

            }
        });
    }
</script>
@endpush
