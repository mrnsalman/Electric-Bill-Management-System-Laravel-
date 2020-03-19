@extends('admin.master')

@section('title', 'MMC || Manage User')



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
                            <li class="breadcrumb-item active text-muted text-bold">User</li>
                            <li class="breadcrumb-item active">Manage Users</li>
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
                                    <div class="col-md-4 mt-2 text-muted text-bold">ALL USERS</div>
                                    <div class="form-group row col-md-8 ml-auto">
                                        <label for="search" class="col-md-3 col-form-label">Search By Field</label>
                                        <select name="field" id="field" class="col-md-3 custom-select">
                                            <option value="username">Username</option>
                                            <option value="fullName">Full Name</option>
                                            <option value="email">Email</option>
                                            <option value="role">Role</option>
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
                                    <tr>
                                        <th>Username</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <th>Role</th>
                                        <th>Image</th>
                                        <th>Registered</th>
                                        <th width="18%">Action</th>
                                    </tr>
                                    </thead>
                                    <tbody id="normal">

                                    @if($users->count() > 0)

                                    @foreach($users as $user)
                                    <tr class="text-bold text-secondary">
                                        <td>{{$user->username}}</td>
                                        <td>{{$user->fullName}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>
                                            @if($user->role == 'super')
                                                {{'Super Admin'}}
                                            @elseif($user->role == 'admin')
                                                {{'Admin'}}
                                            @else
                                                {{'Visitor'}}
                                            @endif
                                        </td>
                                        <td>
                                            <img src="{{$user->image}}" alt="userImage" style="width: 50px;height: 50px;border-radius: 50%">
                                        </td>
                                        <td>{{$user->created_at}}</td>
                                        <td>
                                            <a href="{{route('viewUser',['id' => $user->id])}}" class="btn btn-primary">
                                                <i class="fa fa-eye" aria-hidden="true"></i>
                                            </a>
                                            @if(Auth::user()->role == 'super')
                                            <a href="{{route('editUser',['id' => $user->id])}}" class="btn btn-success">
                                                <i class="fa fa-edit" aria-hidden="true"></i>
                                            </a>
                                            <a href="{{route('deleteUser',['id' => $user->id])}}" onclick="return confirm('Are You Sure!')" class="btn btn-danger">
                                                <i class="fa fa-trash-alt" aria-hidden="true"></i>
                                            </a>
                                            @endif
                                        </td>
                                    </tr>
                                     @endforeach

                                    @else
                                        <tr>
                                            <td colspan="11">
                                                <span class="text-bold text-danger">No user found in the system..!!</span>
                                            </td>
                                        </tr>

                                    @endif

                                    </tbody>
                                    <tbody id="success" style="display: none">

                                    </tbody>
                                </table>
                        </div>
                            <div class="ml-auto mr-4" id="shopLink">
                                {{ $users->links() }}
                            </div>

                        <!-- /.card -->

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
            if(search && field)
            {
                $('#normal').hide();
                $('#shopLink').hide();
                $('#success').show();
            }
            else
            {
                $('#success').hide();
                $('#normal').show();
                $('#shopLink').show();
            }
            $.ajax({
               type: "POST",
                url: '{{URL::to("/userSearch")}}',
                data: {
                    search: search,
                    field: field,
                    _token: '{{csrf_token()}}',
                },
                dataType: 'html',

                success: function (response) {
                    $('#success').html(response);

                }
            });
        }
    </script>
@endpush

