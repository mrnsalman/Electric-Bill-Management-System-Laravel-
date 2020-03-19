@extends('admin.master')

@section('title', 'MMC || Add User')

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
                            <li class="breadcrumb-item active text-bold text-muted">User</li>
                            <li class="breadcrumb-item active">Add User</li>
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
                                {{ __('ADD USER') }}
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{Form::open(['route'=>'newUser','method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'data-parsley-validate' => ''])}}
                                <div class="card-body">
                                    <div class="form-group row">
                                        {{Form::label('username','Username',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                        <div class="col-md-6">
                                            {{Form::text('username','',['class'=>'form-control','placeholder'=>'Enter unique username', 'id' => 'username', 'required' => ''])}}
                                            <span class="text-danger text-bold" id="username_error">{{$errors->has('username') ? $errors->first('username') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {{Form::label('fullName','Full Name',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                        <div class="col-md-6">
                                            {{Form::text('fullName','',['class'=>'form-control','placeholder'=>'Enter your full name', 'required' => ''])}}
                                            <span class="text-danger text-bold">{{$errors->has('fullName') ? $errors->first('fullName') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {{Form::label('email','Email Address',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                        <div class="col-md-6">
                                        {{Form::email('email','',['class'=>'form-control','placeholder'=>'Enter your email', 'id' => 'email', 'required' => '', 'type' => 'email'])}}
                                            <span class="text-danger text-bold" id="email_error">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {{Form::label('password','Password',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                        <div class="col-md-6">
                                            {{Form::password('password',['class'=>'form-control','placeholder'=>'Minimum 6 Characters', 'required' => '', 'minlength' => "6", 'maxlength' => '10'])}}
                                            <span class="text-danger text-bold">{{$errors->has('password') ? $errors->first('password') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {{Form::label('password-confirm','Confirm Password',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                        <div class="col-md-6">
                                            {{Form::password('password-confirm',['class'=>'form-control','placeholder'=>'Confirm password', 'required' => '', 'data-parsley-equalto' => "#password"])}}
                                            <span class="text-danger text-bold">{{$errors->has('password-confirm') ? $errors->first('password-confirm') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {{Form::label('role','User Role',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                        <div class="col-md-6">
                                            {{Form::select('role',[null=>'--Select One---','super'=>'SuperAdmin','admin'=>'Admin','visitor'=>'Visitor'],'0',['class'=>'form-control','id'=>'role', 'required' => ''])}}
                                            <span class="text-danger text-bold">{{$errors->has('role') ? $errors->first('role') : ''}}</span>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        {{Form::label('image','User Image',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                        <div class="col-md-6">
                                         {{Form::file('image',['class'=>'form-control'])}}
                                        </div>
                                    </div>
                                    <div class="form-group row mb-0">
                                        <div class="col-md-6 offset-md-4">
                                            {{Form::submit('Register',['class'=>'btn btn-primary'])}}
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
            $("#username").on("keyup", function() {
                let username = $('#username').val();

                $.ajax({
                    type: "POST",
                    url: '{{URL::to("/username_validation")}}',
                    data: {
                        username: username,
                        field: 'username',
                        _token: '{{csrf_token()}}',
                    },
                    dataType: 'html',

                    success: function (response) {
                        $('#username_error').html(response);

                    }
                });
            })
            $("#email").on("keyup", function() {
                let email = $('#email').val();

                $.ajax({
                    type: "POST",
                    url: '{{URL::to("/email_validation")}}',
                    data: {
                        email: email,
                        field: 'email',
                        _token: '{{csrf_token()}}',
                    },
                    dataType: 'html',

                    success: function (response) {
                        $('#email_error').html(response);

                    }
                });
            })
        })
    </script>
@endpush

