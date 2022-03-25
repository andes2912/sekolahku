<nav class="header-navbar navbar navbar-expand-lg align-items-center floating-nav navbar-light navbar-shadow container-xxl">
    <div class="navbar-container d-flex content">
       
        <ul class="nav navbar-nav align-items-center ml-auto">
           
            <li class="nav-item d-none d-lg-block"><a class="nav-link nav-link-style"><i class="ficon" data-feather="moon"></i></a></li>
            
            <li class="nav-item dropdown dropdown-user">
                <a class="nav-link dropdown-toggle dropdown-user-link" id="dropdown-user" href="javascript:void(0);" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <div class="user-nav d-sm-flex d-none">
                        <span class="user-name font-weight-bolder">{{Auth::user()->name}}</span>
                        <span class="user-status">{{Auth::user()->role}}</span>
                    </div>
                    <span class="avatar">
                        @if (Auth::user()->foto_profile == NULL)
                            <img class="round" src="{{asset('Assets/backend/images/user.jpg')}}" alt="avatar" height="40" width="40">
                        @else
                            <img class="round" src="{{asset('storage/images/PROFILE/' .Auth::user()->foto_profile)}}" alt="avatar" height="40" width="40">
                        @endif
                        <span class="avatar-status-online"></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdown-user">
                    <a class="dropdown-item" href="{{route('profile-settings.index')}}"><i class="mr-50" data-feather="user"></i> Profile</a>
                    <a class="dropdown-item" href=""><i class="mr-50" data-feather="settings"></i> Settings</a>
                    <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();">
                         <i class="mr-50" data-feather="power"></i> Logout
                          <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                              @csrf
                          </form>
                        </a>
                </div>
            </li>
        </ul>
    </div>
</nav>