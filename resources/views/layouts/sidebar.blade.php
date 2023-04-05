<div class="card border-0 shadow-sm">
    <div class="row align-items-end justify-content-center m-0 py-4" style="background: linear-gradient(white, rgb(173, 218, 239))">
        <div class="col-md-4">
            <img src="{{asset('image/Group 2.png')}}" width="80" alt="" />
        </div>
        <div class="col-md-8">
            <small>Prof. Dr. Ir. {{Auth::user()->name}} M.Si.</small>
            <small>Ketua Umum KNPK</small>
        </div>
    </div>
    <ul class="list-group">
        <li class="list-group-item {{ request()->is('home') ? 'active' : '' }}">
            <a href="{{ url('/home') }}" class="link">
                <i class="fa fa-home"></i>
                <span>Dashboard</span>
            </a>
        </li>
        <li class="list-group-item {{ request()->is('knowledge') ? 'active' : '' }}">
            <a href="{{ url('/knowledge') }}" class="link">
                <i class="fa fa-circle-info"></i>
                <span>Informasi</span>
            </a>
        </li>
        <li class="list-group-item {{ request()->is('request') ? 'active' : '' }}">
            <a href="{{ url('/request') }}" class="link">
                <img src="{{asset('image/icon/sidebar/request.png')}}" width="25" />
                <span>Request Materi</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="" class="link">
                <i class="fa fa-magnifying-glass"></i>
                <span>Prediksi</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/video') }}" class="link">
                <i class="fa fa-video"></i>
                <span>Tonton Video</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/photo') }}" class="link">
                <i class="fa fa-photo"></i>
                <span>Galeri Foto</span>
            </a>
        </li>
        <li class="list-group-item {{ request()->is('knowledge-capturing') ? 'active' : '' }}">
            <a href="{{ url('/knowledge-capturing') }}" class="link">
                <i class="fa fa-book"></i>
                <span>Knowledge Capturing</span>
            </a>
        </li>
        <li class="list-group-item {{ request()->is('user') ? 'active' : '' }}">
            <a href="{{ url('/user') }}" class="link">
                <i class="fa fa-users"></i>
                <span>Pengguna</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="" class="link">
                <i class="fa fa-user"></i>
                <span>Profil Saya</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="" class="link">
                <i class="fa fa-message"></i>
                <span>Kirim Pesan</span>
            </a>
        </li>
        <li class="list-group-item {{ request()->is('kritik-dan-saran') ? 'active' : '' }}">
            <a href="{{ url('/kritik-dan-saran') }}" class="link">
                <i class="fa-solid fa-volume-high"></i>
                <span>Kritik dan Saran</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="" class="link">
                <i class="fa fa-gear"></i>
                <span>Pengaturan</span>
            </a>
        </li>
        <li class="list-group-item">
            <a class="link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <i class="fa fa-right-from-bracket"></i>
                <span>Keluar</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>