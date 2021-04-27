
          <div class="content-header">
            <nav class="nav">
              <a href="{{route("index")}}" class="nav-link">Home</a>
              <a href="{{route("apply-volunteer")}}" class="nav-link">Volunteer with us</a>
            </nav>
            @auth
            <div class="nav">
              <a href="{{route("admin.dashboard")}}" class="nav-link">Dashboard</a>
            </div>
            @endauth
          </div><!-- content-header -->