<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <div class="page-sidebar navbar-collapse collapse">
        <ul class="page-sidebar-menu   " data-keep-expanded="false" data-auto-scroll="true" data-slide-speed="200">
            <li class="heading">
                <h3 class="uppercase">Danh mục</h3>
            </li>
            <li class="nav-item @yield('job_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class=" icon-direction"></i>
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
            <li class="nav-item @yield('company_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-briefcase"></i>
                    <span class="title">Quản lý công ty</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('adgetAddCompany') }}" class="nav-link ">
                            <span class="title">Thêm công ty mới</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ route('adgetListCompany') }}" class="nav-link ">
                            <span class="title">Danh sách công ty</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ route('adgetListCompanySize') }}" class="nav-link ">
                            <span class="title">Quy mô công ty</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item @yield('user_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-user"></i>
                    <span class="title">Quản lý người dùng</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('adgetAddUser') }}" class="nav-link ">
                            <span class="title">Thêm người dùng mới</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ route('adgetListUser') }}" class="nav-link ">
                            <span class="title">Danh sách người dùng</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item @yield('course_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-book-open"></i>
                    <span class="title">Quản lý khóa học</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('adgetAddCourse') }}" class="nav-link ">
                            <span class="title">Thêm khóa học mới</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ route('adgetListCourse') }}" class="nav-link ">
                            <span class="title">Danh sách khóa học</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item @yield('testebook_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-docs"></i>
                    <span class="title">Quản lý bài test/ebook</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('adgetAddTest') }}" class="nav-link ">
                            <span class="title">Thêm bài test mới</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ route('adgetListTest') }}" class="nav-link ">
                            <span class="title">Danh sách bài test</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ route('adgetAddEbook') }}" class="nav-link ">
                            <span class="title">Thêm Ebook mới</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ route('adgetListEbook') }}" class="nav-link ">
                            <span class="title">Danh sách Ebook</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item @yield('province_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-map"></i>
                    <span class="title">Quản lý tỉnh thành</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('adgetListProvince') }}" class="nav-link ">
                            <span class="title">Danh sách tỉnh thành</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item @yield('degree_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-graduation"></i>
                    <span class="title">Quản lý bằng cấp/chứng chỉ</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('adgetListDegree') }}" class="nav-link ">
                            <span class="title">Danh sách bằng cấp</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item @yield('author_active')">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-user-female"></i>
                    <span class="title">Quản lý giảng viên</span>
                    <span class="arrow"></span>
                </a>
                <ul class="sub-menu">
                    <li class="nav-item  ">
                        <a href="{{ route('adgetAddAuthor') }}" class="nav-link ">
                            <span class="title">Thêm giảng viên mới</span>
                        </a>
                    </li>
                    <li class="nav-item  ">
                        <a href="{{ route('adgetListAuthor') }}" class="nav-link ">
                            <span class="title">Danh sách giảng viên</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="heading">
                <h3 class="uppercase">Cấu hình hệ thống</h3>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-settings"></i>
                    <span class="title">Cấu hình server</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-equalizer"></i>
                    <span class="title">Cấu hình SEO</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class="icon-bar-chart"></i>
                    <span class="title">Báo cáo</span>
                </a>
            </li>
            <li class="nav-item  ">
                <a href="javascript:;" class="nav-link nav-toggle">
                    <i class=" icon-feed"></i>
                    <span class="title">Thông tin API</span>
                </a>
            </li>
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
    <!-- END SIDEBAR -->
</div>
<!-- END SIDEBAR -->
