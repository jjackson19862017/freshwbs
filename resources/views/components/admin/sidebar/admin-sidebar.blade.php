<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="{{route('home')}}">
        <div class="sidebar-brand-icon rotate-n-15">
            <i class="fab fa-linode"></i>
        </div>
        <div class="sidebar-brand-text mx-3">Hotel Manager</div>
    </a>

    <x-admin.sidebar.admin-sidebar-user-information></x-admin.sidebar.admin-sidebar-user-information>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">
    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('admin.index')}}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span></a>
    </li>




    <!-- Nav Item - Pages Collapse Menu -->
    @if(auth()->user()->userHasRole('Admin') || auth()->user()->userHasRole('Manager') || auth()->user()->userHasRole('Owner'))
    <!-- Divider -->
    <hr class="sidebar-divider">
        <!-- Heading -->
            <div class="sidebar-heading">
                Admin
            </div>
        <x-admin.sidebar.admin-sidebar-user></x-admin.sidebar.admin-sidebar-user>
        @if(auth()->user()->userHasRole('Admin'))
        <x-admin.sidebar.admin-sidebar-authorization></x-admin.sidebar.admin-sidebar-authorization>
        @endif
    @endif

    @if(!auth()->user()->userHasRole('Staff'))
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Events
        </div>
        <x-admin.sidebar.admin-sidebar-customers></x-admin.sidebar.admin-sidebar-customers>
        <x-admin.sidebar.admin-sidebar-events></x-admin.sidebar.admin-sidebar-events>
        @if(auth()->user()->userHasRole('Owner') || auth()->user()->userHasRole('Admin'))
        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Statistics
        </div>
        <x-admin.sidebar.admin-sidebar-stats></x-admin.sidebar.admin-sidebar-stats>

        <!-- Divider -->
        <hr class="sidebar-divider">
        <!-- Heading -->
        <div class="sidebar-heading">
            Hotels
        </div>
        <x-admin.sidebar.admin-sidebar-shard></x-admin.sidebar.admin-sidebar-shard>
        <x-admin.sidebar.admin-sidebar-themill></x-admin.sidebar.admin-sidebar-themill>
        <x-admin.sidebar.admin-sidebar-staff></x-admin.sidebar.admin-sidebar-staff>
        @endif
 <!-- Divider -->
    <hr class="sidebar-divider">
@endif



    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
