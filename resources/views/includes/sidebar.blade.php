<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">
    <!-- Sidebar - Brand -->
    <a class="sidebar-brand d-flex align-items-center justify-content-center" href="#">
        <div class="sidebar-brand-icon">
            <i class="fas fa-school"></i>
        </div>
        <div class="sidebar-brand-text mx-3">SD Negeri 98/X Rantau Indah</div>
    </a>

    <!-- Divider -->
    <hr class="sidebar-divider my-0">

    <!-- Nav Item - Dashboard -->
    <li class="nav-item">
        <a class="nav-link" href="{{ route('home') }}">
            <i class="fas fa-fw fa-home"></i>
            <span>Dashboard</span>
        </a>
    </li>

    <!-- Divider -->
    <hr class="sidebar-divider">

    <!-- Heading -->
    <div class="sidebar-heading">
        Master Data
    </div>

    <!-- Nav Items - Semua menu ditampilkan langsung -->
    <li class="nav-item">
        <a class="nav-link" href="{{route('user.index')}}">
            <i class="fas fa-fw fa-user"></i>
            <span>User</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('agama.index')}}">
            <i class="fas fa-fw fa-pray"></i>
            <span>Agama</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('jenis_kelamin.index')}}">
            <i class="fas fa-fw fa-venus-mars"></i>
            <span>Jenis Kelamin</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('pekerjaan_ortu.index')}}">
            <i class="fas fa-fw fa-briefcase"></i>
            <span>Pekerjaan Orang Tua</span>
        </a>
    </li>

    <li class="nav-item">
        <a class="nav-link" href="{{route('penghasilan_ortu.index')}}">
            <i class="fas fa-fw fa-money-bill"></i>
            <span>Penghasilan Orang Tua</span>
        </a>
    </li>

    <!-- Sidebar Toggler (Sidebar) -->
    <div class="text-center d-none d-md-inline mt-4">
        <button class="rounded-circle border-0" id="sidebarToggle">
            <i class="fas fa-angle-left"></i>
        </button>
    </div>
</ul>
