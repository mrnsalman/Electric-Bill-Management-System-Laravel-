@extends('admin.master')

@section('title','MMC || Edit User')


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
                            <li class="breadcrumb-item active text-bold text-muted">Profile</li>
                            <li class="breadcrumb-item active">Edit Profile</li>
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
                                {{ __('EDIT PROFILE') }}
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{Form::model(Auth::user(),['route'=>'updateProfile','method'=>'post','class'=>'form-horizontal','enctype'=>'multipart/form-data', 'data-parsley-validate' => ''])}}
                            <div class="card-body">
                                <div class="form-group row">
                                    {{Form::label('username','Username',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                    <div class="col-md-6">
                                        {{Form::text('username',Auth::user()->username,['class'=>'form-control','placeholder'=>'Enter username', 'id' => 'username', 'required' => ''])}}
                                        {{Form::hidden('id',Auth::user()->id,['class'=>'form-control'])}}
                                        <span class="text-danger text-bold" id="username_error">{{$errors->has('username') ? $errors->first('username') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('fullName','Full Name',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                    <div class="col-md-6">
                                        {{Form::text('fullName',Auth::user()->fullName,['class'=>'form-control','placeholder'=>'Enter fullname', 'required' => ''])}}
                                        <span class="text-danger text-bold">{{$errors->has('fullName') ? $errors->first('fullName') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('email','Email Address',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                    <div class="col-md-6">
                                        {{Form::email('email',Auth::user()->email,['class'=>'form-control','placeholder'=>'Enter email', 'id' => 'email', 'required' => '', 'type' => 'email'])}}
                                        <span class="text-danger text-bold" id="email_error">{{$errors->has('email') ? $errors->first('email') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('role','User Role',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                    <div class="col-md-6">
                                        @if(Auth::user()->role == 'super')
                                            {{Form::select('role',[null=>'--Select One---','super'=>'SuperAdmin','admin'=>'Admin','visitor'=>'Visitor'],'super',['class'=>'form-control', 'required' => ''])}}
                                        @elseif(Auth::user()->role == 'admin')
                                            {{Form::select('role',[null=>'--Select One---','super'=>'SuperAdmin','admin'=>'Admin','visitor'=>'Visitor'],'admin',['class'=>'form-control', 'required' => ''])}}
                                        @else
                                            {{Form::select('role',[null=>'--Select One---','super'=>'SuperAdmin','admin'=>'Admin','visitor'=>'Visitor'],'visitor',['class'=>'form-control', 'required' => ''])}}
                                        @endif
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
                                        {{Form::submit('Update',['class'=>'btn btn-primary'])}}
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



