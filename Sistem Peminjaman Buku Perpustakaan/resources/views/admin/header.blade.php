<nav class="navbar navbar-default header navbar-fixed-top">
  <div class="col-md-12 nav-wrapper">
    <div class="navbar-header" style="width:100%;">
      <div class="opener-left-menu is-open">
        <span class="top"></span>
        <span class="middle"></span>
        <span class="bottom"></span>
      </div>
      <a href="{{ url('/') }}" class="navbar-brand">
       <b>Admin Area</b>
      </a>

      <ul class="nav navbar-nav navbar-right user-nav">
        <li class="user-name">
          <span>Admin</span>
        </li>
        <li class="dropdown avatar-dropdown">
          <img src="{{ asset('assetadmin/img/avatar.jpg')}}" class="img-circle avatar" alt="user name" data-toggle="dropdown" aria-haspopup="true" aria-expanded="true"/>
          <ul class="dropdown-menu user-dropdown">
            <li>
              <a class="dropdown-item" href="{{ route('logout') }}"
                 onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();">
                               <span class="fa fa-power-off"></span>
                  {{ __('Logout') }}
              </a>
              <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                  @csrf
              </form>
            </li>
          </li>
        </ul>
      </ul>
    </div>
  </div>
</nav>
