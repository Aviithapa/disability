
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
            <li class="{{ (request()->is('dashboard')) ? 'active':''  }}">
                <a href="/">
                    <i class="icon-home"></i> <span>ड्यासबोर्ड</span>
                </a>
            </li>
             <li class="treeview {{ (request()->is('dashboard/*')) ? (request()->is('dashboard/printIndex') ) ? '' : 'active' :''  }}"> <a href="#"> <i class="icon-grid"></i> <span>अपाङ्गता परिचय पत्र</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                <ul class="treeview-menu">
                     <li class="{{ (request()->is('dashboard/*')) ? (request()->is('dashboard/printIndex') || request()->is('dashboard/disability-type') || request()->is('dashboard/disability-group')) ? '' : 'active' :''  }}">
                        <a href="{{ route('applicantData') }}">
                            <i class="icon-book-open"></i> <span>अपाङ्गता परिचय पत्र</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('dashboard/disability-type')) ? 'active' :''  }}">
                        <a href="{{ route('disability-type.index') }}">
                            <i class="icon-book-open"></i> <span>अपांगताको प्रकार</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('dashboard/disability-group')) ? 'active' :''  }}">
                        <a href="{{ route('disability-group.index') }}">
                            <i class="icon-book-open"></i> <span>अपांगताको वर्गीकरण</span>
                        </a>
                    </li>
                </ul>
            </li>
             <li class="treeview {{ (request()->is('dashboard/printIndex')) || (request()->is('dashboard/printed'))  ? 'active' :''  }}"> <a href="#"> <i class="icon-grid"></i> <span>अपाङ्गता कार्ड</span> <span class="pull-right-container"> <i class="fa fa-angle-left pull-right"></i> </span> </a>
                <ul class="treeview-menu">
                     <li class="{{ (request()->is('dashboard/printIndex')) ? 'active' :''  }}">
                        <a href="{{ route('printIndex') }}">
                            <i class="icon-book-open"></i> <span>छाप्नुहोस्</span>
                        </a>
                    </li>
                    <li class="{{ (request()->is('dashboard/printed')) ? 'active' :''  }}">
                        <a href="{{ route('disability-type.index') }}">
                            <i class="icon-book-open"></i> <span>छापिएको</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
    </div>
    <!-- /.sidebar -->
</aside>
