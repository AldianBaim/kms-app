<div class="card border-0">
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
                <img src="{{asset('image/icon/sidebar/dashboard.png')}}" width="25" />
                <span>Dashboard</span>
            </a>
        </li>
        <li class="list-group-item {{ request()->is('knowledge') ? 'active' : '' }}">
            <a href="{{ url('/knowledge') }}" class="link">
                <img src="{{asset('image/icon/sidebar/knowledge.png')}}" width="25" />
                <span>Informasi</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="" class="link">
                <img src="{{asset('image/icon/sidebar/capturing.png')}}" width="25" />
                <span>Prediksi</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="" class="link">
                <img src="{{asset('image/icon/sidebar/request.png')}}" width="25" />
                <span>Pengajuan Materi</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/knowledge') }}" class="link">
                <img src="{{asset('image/icon/sidebar/knowledge.png')}}" width="25" />
                <span>Tonton Video</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/knowledge') }}" class="link">
                <img src="{{asset('image/icon/sidebar/knowledge.png')}}" width="25" />
                <span>Galeri Foto</span>
            </a>
        </li>
        <li class="list-group-item {{ request()->is('knowledge-capturing') ? 'active' : '' }}">
            <a href="{{ url('/knowledge-capturing') }}" class="link">
                <img src="{{asset('image/icon/sidebar/capturing.png')}}" width="25" />
                <span>Knowledge Capturing</span>
            </a>
        </li>
        <li class="list-group-item {{ request()->is('user') ? 'active' : '' }}">
            <a href="{{ url('/user') }}" class="link">
                <img src="{{asset('image/icon/sidebar/management-user.png')}}" width="25" />
                <span>Pengguna</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="" class="link">
                <img src="{{asset('image/icon/sidebar/profile.png')}}" width="25" />
                <span>Profil Saya</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="" class="link">
                <img src="{{asset('image/icon/sidebar/messaging.png')}}" width="25" />
                <span>Kirim Pesan</span>
            </a>
        </li>
        <li class="list-group-item {{ request()->is('kritik-dan-saran') ? 'active' : '' }}">
            <a href="{{ url('/kritik-dan-saran') }}" class="link">
                <img src="{{asset('image/icon/sidebar/critic.png')}}" width="25" />
                <span>Kritik dan Saran</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="" class="link">
                <img src="{{asset('image/icon/sidebar/setting.png')}}" width="25" />
                <span>Pengaturan</span>
            </a>
        </li>
        <li class="list-group-item">
            <a class="link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <img src="{{asset('image/icon/sidebar/logout.png')}}" width="25" />
                <span>Keluar</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>