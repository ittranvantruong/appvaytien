<!-- Page Wrapper -->
<div id="wrapper">

    <!-- Sidebar -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">Admin</div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="{{ route('admin.index') }}">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>Dashboard</span></a>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#managerTour"
                aria-expanded="true" aria-controls="managerOrder">
                <i class="fas fa-people-carry"></i>
                <span>Qlý gói vay</span>
            </a>
            <div id="managerTour" class="collapse" aria-labelledby="headingTwo" data-parent="#managerTour">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.loan.amount.index') }}">Khoản vay ước tính</a>
                    <a class="collapse-item" href="{{ route('admin.loan.period.index') }}">Thời gian cho vay</a>
                    
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#managerPackageUser"
                aria-expanded="true" aria-controls="managerOrder">
                <i class="fas fa-people-carry"></i>
                <span>Qlý gói vay thành viên</span>
            </a>
            <div id="managerPackageUser" class="collapse" aria-labelledby="headingTwo" data-parent="#managerPackageUser">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.user.loan.amount.index', ['status' => 0]) }}">Chưa xét duyệt</a>
                    <a class="collapse-item" href="{{ route('admin.user.loan.amount.index', ['status' => 1]) }}">Đã xét duyệt</a>                    
                </div>
            </div>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider">

        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#managerUser"
                aria-expanded="true" aria-controls="managerUser">
                <i class="fas fa-people-carry"></i>
                <span>Qlý thành viên</span>
            </a>
            <div id="managerUser" class="collapse" aria-labelledby="headingTwo" data-parent="#managerUser">
                <div class="bg-white py-2 collapse-inner rounded">
                    <a class="collapse-item" href="{{ route('admin.user.create') }}">Thêm thành viên</a>
                    <a class="collapse-item" href="{{ route('admin.user.index') }}">Danh sách thành viên</a>
                </div>
            </div>
        </li>

        <!-- Divider -->
        <hr class="sidebar-divider">

        <!-- Nav Item - Pages Collapse Menu -->
        <li class="nav-item">
            <a class="nav-link" href="{{ route('admin.setting') }}">
                <i class="fas fa-cogs"></i>
                <span>Cài đặt</span></a>
        </li>
        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>


    </ul>
    <!-- End of Sidebar -->
