@extends('admin.master')

@section('title', 'MMC || Add Shop')

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
                            <li class="breadcrumb-item active text-bold text-muted">Shop</li>
                            <li class="breadcrumb-item active">Add Shop</li>
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
                                {{ __('ADD SHOP') }}
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{Form::open(['route'=>'newShop','method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'data-parsley-validate' => ''])}}
                                <div class="card-body">
                                    <div class="form-group row">
                                        {{Form::label('shop_no','Shop No.',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                        <div class="col-md-6">
                                            {{Form::text('shop_no','',['class'=>'form-control','placeholder'=>'Enter shop number','id'=>'shop_no', 'required' => ''])}}
                                            <span class="text-danger text-bold">{{$errors->has('shop_no') ? $errors->first('shop_no') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {{Form::label('floor','Shop Floor',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                        <div class="col-md-6">
                                            {{Form::select('floor',[null=>'--Select One---','1'=>'First Floor','2'=>'Second Floor'],'0',['class'=>'form-control','id'=>'floor', 'required' => ''])}}
                                            {{Form::hidden('shop_id','',['class'=>'form-control','placeholder'=>'Enter shop number','id'=>'shop_id'])}}
                                            <span class="text-danger text-bold">{{$errors->has('floor') ? $errors->first('floor') : ''}}</span>
                                            <span class="text-danger text-bold" id="shop_id_error">{{$errors->has('shop_id') ? $errors->first('shop_id') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {{Form::label('shop_name','Shop Name',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                        <div class="col-md-6">
                                            {{Form::text('shop_name','',['class'=>'form-control','placeholder'=>'Enter shop name', 'required' => ''])}}
                                            <span class="text-danger text-bold">{{$errors->has('shop_name') ? $errors->first('shop_name') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {{Form::label('user','Shop User',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                        <div class="col-md-6">
                                            {{Form::text('user','',['class'=>'form-control','placeholder'=>'Enter shop User', 'id'=>'user', 'required' => ''])}}
                                            <div id="getuser"></div>
                                            <span class="text-danger text-bold">{{$errors->has('user') ? $errors->first('user') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {{Form::label('shop_owner','Shop Owner',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                        <div class="col-md-6">
                                        {{Form::text('shop_owner','',['class'=>'form-control','placeholder'=>'Enter shop owner name', 'required' => ''])}}
                                            <span class="text-danger text-bold">{{$errors->has('shop_owner') ? $errors->first('shop_owner') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {{Form::label('owner_address','Owner Address',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                        <div class="col-md-6">
                                            {{Form::text('owner_address','',['class'=>'form-control','placeholder'=>'Enter owner address', 'required' => ''])}}
                                            <span class="text-danger text-bold">{{$errors->has('owner_address') ? $errors->first('owner_address') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {{Form::label('owner_contact','Owner Contact',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                        <div class="col-md-6">
                                            {{Form::text('owner_contact','',['class'=>'form-control','placeholder'=>'Enter owner contact number', 'required' => ''])}}
                                            <span class="text-danger text-bold">{{$errors->has('owner_contact') ? $errors->first('owner_contact') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {{Form::label('image','Owner Image',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                        <div class="col-md-6">
                                         {{Form::file('image',['class'=>'form-control'])}}
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            {{Form::submit('Add Shop',['class'=>'btn btn-primary'])}}
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
        $(document).ready(function(){
            $("#floor").on("change", function(){
                var a =$('#shop_no').val();
                var b = $('#floor').val();
                var sum = a + '/' + b;
                $('#shop_id').val(sum);
                let shop_id = $('#shop_id').val();
                $.ajax({
                    type: "POST",
                    url: '{{URL::to("/shop_id_validation")}}',
                    data: {
                        shop_id: shop_id,
                        field: 'shop_id',
                        _token: '{{csrf_token()}}',
                    },
                    dataType: 'html',

                    success: function (response) {
                        $('#shop_id_error').html(response);

                    }
                });
            })
            $("#user").on("keyup", function(){
                var user = $('#user').val();
                var username = 'username';

                $.ajax({
                    type: "POST",
                    url: '{{URL::to("/shopUserSearch")}}',
                    data: {
                        user: user,
                        field: username,
                       _token: '{{csrf_token()}}',
                    },
                    dataType: 'html',

                    success: function(response) {
                        $('#getuser').html(response);

                    }
                });

            })
            $(document).on('click', 'li', function () {
                $('#user').val($(this).val());
                $('#getuser').hide();
            });
        })
    </script>

@endpush

