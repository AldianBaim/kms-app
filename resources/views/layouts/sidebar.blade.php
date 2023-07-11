<div class="card border-0 shadow-sm">
    <div class="row align-items-end justify-content-center m-0 py-4" style="background: linear-gradient(white, rgb(173, 218, 239))">
        <div class="col-md-4">
            @if(Auth::user()->avatar)
            <img src="{{ url('storage/image/avatar/' . Auth::user()->avatar) }}" width="80" alt="" />
            @else
            <img src="{{ asset('/image/avatar-default.png') }}" width="80" alt="" />
            @endif
        </div>
        <div class="col-md-8">
            <small>{{ Auth::user()->name }}</small> <br>
            <small class="text-muted">{{ Auth::user()->job }}</small>
        </div>
    </div>

    @if (Auth::user()->role_name == 'admin')

    <ul class="list-group">
        <li class="list-group-item {{ request()->is('home') ? 'active' : '' }}">
            <a href="{{ url('/home') }}" class="link">
                <i class="fa fa-fw fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="list-group-item {{ request()->is('knowledge') ? 'active' : '' }}">
            <a href="{{ url('/admin/posts') }}" class="link">
                <i class="fa fa-fw fa-circle-info"></i>
                <span>Manage Knowledge</span>
            </a>
        </li>
        <li class="list-group-item {{ request()->is('request') ? 'active' : '' }}">
            <a href="{{ url('/admin/requests') }}" class="link">
                <i class="fa fa-fw fa-file-export"></i>
                <span>Manage Request</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/admin/files') }}" class="link">
                <i class="fa fa-fw fa-file"></i>
                <span>Manage File</span>
            </a>
        </li>
        <li class="list-group-item {{ request()->is('user') ? 'active' : '' }}">
            <a href="{{ url('/admin/users') }}" class="link">
                <i class="fa fa-fw fa-users"></i>
                <span>Manage Users</span>
            </a>
        </li>
        <li class="list-group-item {{ request()->is('kritik-dan-saran') ? 'active' : '' }}">
            <a href="{{ url('/admin/feedbacks') }}" class="link">
                <i class="fa-solid fa-fw fa-volume-high"></i>
                <span>Manage Feedback</span>
            </a>
        </li>
        <li class="list-group-item">
            <a class="link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fa fa-fw fa-right-from-bracket"></i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>

    @endif

    @if (Auth::user()->role_name == 'petani' || Auth::user()->role_name == 'pedagang' || Auth::user()->role_name == 'penyuluh' || Auth::user()->role_name == 'dinas')

    <ul class="list-group">
        <li class="list-group-item {{ request()->is('home') ? 'active' : '' }}">
            <a href="{{ url('/home') }}" class="link">
                <i class="fa fa-fw fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="list-group-item {{ request()->is('knowledge') ? 'active' : '' }}">
            <a href="{{ url('/knowledge') }}" class="link">
                <i class="fa fa-fw fa-circle-info"></i>
                <span>Knowledge</span>
            </a>
        </li>
        <li class="list-group-item {{ request()->is('request') ? 'active' : '' }}">
            <a href="{{ url('/request/create') }}" class="link">
                <i class="fa fa-fw fa-file-export"></i>
                <span>Content Request</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/prediction') }}" class="link">
                <i class="fa fa-fw fa-magnifying-glass"></i>
                <span>Prediction</span>
            </a>
        </li>
        <li class="list-group-item {{ request()->is('knowledge-capturing') ? 'active' : '' }}">
            <a href="{{ url('/knowledge/create') }}" class="link">
                <i class="fa fa-fw fa-pencil"></i>
                <span>Knowledge Capturing</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/video') }}" class="link">
                <i class="fa fa-fw fa-video"></i>
                <span>Watch Video</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/photo') }}" class="link">
                <i class="fa fa-fw fa-photo"></i>
                <span>Photo Gallery</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/berbagi-berkas') }}" class="link">
                <i class="fa fa-fw fa-file"></i>
                <span>File Sharing</span>
            </a>
        </li>
        <li class="list-group-item {{ request()->is('user') ? 'active' : '' }}">
            <a href="{{ url('/user') }}" class="link">
                <i class="fa fa-fw fa-users"></i>
                <span>Users</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/my-profile') }}" class="link">
                <i class="fa fa-fw fa-user"></i>
                <span>My Profile</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/message') }}" class="link">
                <i class="fa fa-fw fa-message"></i>
                <span>Inbox</span>
            </a>
        </li>
        <li class="list-group-item {{ request()->is('kritik-dan-saran') ? 'active' : '' }}">
            <a href="{{ url('/kritik-dan-saran') }}" class="link">
                <i class="fa-solid fa-fw fa-volume-high"></i>
                <span>Feedback</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/pengaturan') }}" class="link">
                <i class="fa fa-fw fa-gear"></i>
                <span>Setting</span>
            </a>
        </li>
        <li class="list-group-item">
            <a class="link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fa fa-fw fa-right-from-bracket"></i>
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>

    @endif

    
</div>