@extends('admin.master')

@section('title','MMC || Change Password')


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
                            <li class="breadcrumb-item active">Change Password</li>
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
                                {{ __('CHANGE PASSWORD') }}
                            </div>
                            <!-- /.card-header -->
                            <!-- form start -->
                            {{Form::open(['route'=>'updatePassword','method'=>'post','class'=>'form-horizontal', 'data-parsley-validate' => ''])}}
                            <div class="card-body">
                                <div class="form-group row">
                                    {{Form::label('oldPassword','Old Password',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                    <div class="col-md-6">
                                        {{Form::password('oldPassword',['class'=>'form-control','placeholder'=>'Minimum 6 Characters', 'required' => '', 'minlength' => "6", 'maxlength' => '10', 'data-parsley-trigger' => "keyup"])}}
                                        {{Form::hidden('id',Auth::user()->id,['class'=>'form-control'])}}
                                        <span class="text-danger text-bold">{{$errors->has('oldPassword') ? $errors->first('oldPassword') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('newPassword','New Password',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                    <div class="col-md-6">
                                        {{Form::password('newPassword',['class'=>'form-control','placeholder'=>'Minimum 6 Characters', 'required' => '', 'minlength' => "6", 'maxlength' => '10'])}}
                                        <span class="text-danger text-bold">{{$errors->has('newPassword') ? $errors->first('newPassword') : ''}}</span>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    {{Form::label('confirmPassword','Confirm Password',['class'=>'col-md-4 col-form-label text-md-right text-muted'])}}
                                    <div class="col-md-6">
                                        {{Form::password('confirmPassword',['class'=>'form-control','placeholder'=>'Confirm password', 'data-parsley-equalto' => "#newPassword"])}}
                                        <span class="text-danger text-bold">{{$errors->has('confirmPassword') ? $errors->first('confirmPassword') : ''}}</span>
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
@endpush
