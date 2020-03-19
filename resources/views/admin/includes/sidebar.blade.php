<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="{{url('/home')}}" class="brand-link">
        <img src="{{url('dist/img/MosqueM.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3"
             style="opacity: .8">
        <span class="brand-text font-weight-light">Market Committee</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{Auth::user()->image}}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info text-bold text-uppercase">
                <a href="" class="d-block">{{Auth::user()->username}}</a>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
                     with font-awesome or any other icon font library -->
                <li class="nav-item has-treeview menu-closed">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-user-circle"></i>
                        <p>
                            PROFILE
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('viewProfile')}}" class="nav-link">
                                <i class="fa fa-eye"></i>
                                <p>VIEW PROFILE</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('editProfile')}}" class="nav-link">
                                <i class="fa fa-edit"></i>
                                <p>EDIT PROFILE</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('changePassword')}}" class="nav-link">
                                <i class="fa fa-lock"></i>
                                <p>CHANGE PASSWORD</p>
                            </a>
                        </li>

                    </ul>
                </li>
                @if(Auth::user()->role == 'super' || Auth::user()->role == 'admin')
                <li class="nav-item has-treeview menu-closed">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fa fa-user"></i>
                        <p>
                            USER
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        @if(Auth::user()->role == 'super')
                        <li class="nav-item">
                            <a href="{{route('addUser')}}" class="nav-link">
                                <i class="fa fa-user-plus"></i>
                                <p>ADD USER</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('manageUser')}}" class="nav-link">
                                <i class="fa fa-users-cog"></i>
                                <p>MANAGE USERS</p>
                            </a>
                        </li>
                        @else
                        <li class="nav-item">
                            <a href="{{route('manageUser')}}" class="nav-link">
                                <i class="fa fa-users-cog"></i>
                                <p>ALL USERS</p>
                            </a>
                        </li>
                        @endif
                    </ul>
                </li>
                @endif

                <li class="nav-item has-treeview menu-closed">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-store"></i>
                        <p>
                            SHOPS
                            <i class="right fa fa-angle-left"></i>
                        </p>
                    </a>
                    @if(Auth::user()->role == 'super' || Auth::user()->role == 'admin')
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('addShop')}}" class="nav-link">
                                <i class="fas fa-plus-square"></i>
                                <p>ADD SHOP</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{route('manageShop')}}" class="nav-link">
                                <i class="fas fa-tasks"></i>
                                <p>MANAGE SHOPS</p>
                            </a>
                        </li>
                    </ul>
                    @else
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{route('manageShop')}}" class="nav-link">
                                <i class="fas fa-tasks"></i>
                                <p>YOUR SHOP</p>
                            </a>
                        </li>
                    </ul>
                    @endif
                </li>
                @if(Auth::user()->role == 'super' || Auth::user()->role == 'admin')
                <li class="nav-item has-treeview menu-closed">
                    <a href="{{ route('bill_list') }}" class="nav-link">
                        <i class="nav-icon fas fa-lightbulb"></i>
                        <p>
                            BILLS
                        </p>
                    </a>
                </li>
                @endif
                <li class="nav-item has-treeview menu-closed">
                    <a class="nav-link" href="{{ route('logout') }}"
                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                        <i class="fa fa-sign-out-alt nav-icon"></i>
                        {{ __('LOGOUT') }}
                    </a>

                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                        @csrf
                    </form>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>

