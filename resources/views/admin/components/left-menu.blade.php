<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="heading">
                <h3 class="uppercase">Danh mục</h3>
            </li>
            <li class="nav-item @yield('job_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">Quản lý tuyển dụng</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('adgetAddJob') }}" class="nav-link ">
                            <span class="title">Thêm việc làm mới</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ route('adgetListJob') }}" class="nav-link ">
                            <span class="title">Danh sách việc làm</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item @yield('job_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-layers"></i>
                    <span class="title">Quản lý doanh nghiệp</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('adgetAddJob') }}" class="nav-link ">
                            <span class="title">Thêm doanh nghiệp mới</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ route('adgetListJob') }}" class="nav-link ">
                            <span class="title">Danh sách doanh nghiệp</span>
                        </a>
                    </li>
                </ul>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->
