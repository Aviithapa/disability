
<!-- Left side column. contains the logo and sidebar -->
<aside class="main-sidebar">
    <!-- sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel -->
        <div class="user-panel">
            <div class="image text-center">
                {{-- <img src="{{asset('dist/img/avatar.png')}}" class="img-circle" alt="User Image" /> --}}
            </div>
            <div class="info">
                <p>Abhishek Thapa</p>
                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
            </div>
        </div>

        <!-- sidebar menu -->
        <!-- sidebar menu -->
        <ul class="sidebar-menu" data-widget="tree">
            <li class="header">PERSONAL</li>
            <li class="{{ (request()->is('ward/dashboard')) ? 'active':''  }}">
                <a href="/">
                    <i class="icon-home"></i> <span>Dashboard</span>

                </a>
            </li>
            <li class="{{ (request()->is('dashboard/*'))  ? 'active' :''  }}">
                <a href="{{ route('applicantData') }}">
                    <i class="icon-book-open"></i> <span>Applicant Data</span>
                </a>
            </li>
          
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
