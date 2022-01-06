@auth
<nav class="main-header topHeader navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
        <li class="nav-item">
            <a class="nav-link" data-widget="pushmenu" id="sidebar-close" onclick="collapsNav()" href="#" role="button"><i class="fas fa-align-left"></i></a>
        </li>
    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ">
        <!-- Navbar Search -->
        <li class="nav-item">
            <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                <i class="fas fa-search"></i>
            </a>
            <div class="navbar-search-block">

            </div>
        </li>

        <!-- Notifications Dropdown Menu -->
        <ul class="header-info  d-flex">
            <li title="Point of Sales">
                <a href="#" style="color: white; text-decoration: none;"><strong><i
                            class="fas fa-cash-register"></i><span>POS</span></strong></a>
            </li>
            <li title="Currency">
                <i class="fas fa-sack-dollar" aria-hidden="true"></i>
            </li>
            <li title="Today's Profit ">
                <i class="fa fa-dollar-sign" aria-hidden="true"></i>
            </li>
            {{--  <li title="Language">
                <select name="language" id="lang">
                    <option value="1">EN</option>
                    <option value="2">BN</option>
                    <option value="3">HN</option>
                    <option value="4">Ch</option>
                </select>
            </li>  --}}
            <li title="Current Date">
                <strong>{{ date('d F Y') }}</strong>
            </li>
            <li title="Notification">
                <i class="fas fa-bell" aria-hidden="true"></i>
            </li>
        </ul>
        <li class="admin-icon">
            <div class="dropdown">
                <button class="btn btn-secondary dropdown-toggle user-drop-btn" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false" style="background-color: transparent;">
                    {{-- <img src="img/Profile_id.png" alt="" style="width: 30px;"> --}}
                {{ Auth::user()->name }}</button>
                   <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                    <li><a class="dropdown-item" href="#"><i class="fa fa-user"></i> Profile </a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-cog"></i> Setting</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fas fa-user-friends"></i> Switch user</a></li>
                    <li><a class="dropdown-item" href="#"><i class="fa fa-dollar-sign"></i> My transaction</a></li>
                    <li><a class="dropdown-item" href="{{ route('logout') }}"
                        onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
                        <i class="fas fa-sign-out-alt"></i> Logout </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
  </nav>
@endauth

