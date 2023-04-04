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
        <li class="list-group-item">
            <a href="" class="link">
                <img src="{{asset('image/icon/sidebar/dashboard.png')}}" width="25" />
                <span>Dashboard</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="{{ url('/knowledge') }}" class="link">
                <img src="{{asset('image/icon/sidebar/knowledge.png')}}" width="25" />
                <span>Manajemen Knowledge</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="" class="link">
                <img src="{{asset('image/icon/sidebar/capturing.png')}}" width="25" />
                <span>Knowledge Capturing</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="" class="link">
                <img src="{{asset('image/icon/sidebar/management-user.png')}}" width="25" />
                <span>Manajemen User</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="" class="link">
                <img src="{{asset('image/icon/sidebar/request.png')}}" width="25" />
                <span>Manajemen Request</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="" class="link">
                <img src="{{asset('image/icon/sidebar/profile.png')}}" width="25" />
                <span>My Profile</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="" class="link">
                <img src="{{asset('image/icon/sidebar/messaging.png')}}" width="25" />
                <span>Messaging</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="" class="link">
                <img src="{{asset('image/icon/sidebar/critic.png')}}" width="25" />
                <span>Kritik dan Saran</span>
            </a>
        </li>
        <li class="list-group-item">
            <a href="" class="link">
                <img src="{{asset('image/icon/sidebar/setting.png')}}" width="25" />
                <span>Setting</span>
            </a>
        </li>
        <li class="list-group-item">
            <a class="link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();">
                <img src="{{asset('image/icon/sidebar/logout.png')}}" width="25" />
                <span>Logout</span>
            </a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        </li>
    </ul>
</div>