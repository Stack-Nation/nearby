
    <aside class="aside aside-fixed">
        <div class="aside-header">
          <a href="{{route("index")}}" class="aside-logo">Near<span>by</span></a>
          <a href="" class="aside-menu-link">
            <i data-feather="menu"></i>
            <i data-feather="x"></i>
          </a>
        </div>
        <div class="aside-body">
          <div class="aside-loggedin">
            <div class="aside-loggedin-user">
              <a href="#loggedinMenu" class="d-flex align-items-center justify-content-between mg-b-2">
                <h6 class="tx-semibold mg-b-0">{{Auth::user()->name}}</h6>
              </a>
              <p class="tx-color-03 tx-12 mg-b-0">Administrator</p>
            </div>
          </div><!-- aside-loggedin -->
          <ul class="nav nav-aside">
            <li class="nav-item active"><a href="{{route("admin.dashboard")}}" class="nav-link"><i data-feather="home"></i> <span>Dashboard</span></a></li>
          </ul>
        </div>
      </aside>