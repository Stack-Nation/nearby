
        <!-- Sidenav Black Overlay-->
        <div class="sidenav-black-overlay"></div>
        <!-- Side Nav Wrapper-->
        <div class="sidenav-wrapper" id="sidenavWrapper">
          <!-- Go Back Button-->
          <div class="go-back-btn mb-4" id="goBack">
            <svg class="bi bi-x" width="24" height="24" viewBox="0 0 16 16" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
              <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"></path>
              <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"></path>
            </svg>
          </div>
          <!-- Sidenav Nav-->
          <br>
          <ul class="sidenav-nav ps-0">
            <li>
              <a href="{{route("admin.dashboard")}}">Home</a>
            </li>
            <li class="affan-dropdown-menu">
              <a href="#">Volunteers</a>
              <ul>
                <li><a href="{{route("admin.volunteers.pending")}}">Pending Volunteers</a></li>
                <li><a href="{{route("admin.volunteers.approved")}}">Approved Volunteers</a></li>
              </ul>
            </li>
            <li>
              <a href="{{route("admin.resources.index")}}">Resources</a>
            </li>
            <li>
              <a href="#logout" onclick="document.getElementById('logoutF').submit();">Logout</a>
            </li>
          </ul>
          <!-- Copyright Info-->
          <div class="copyright-info">
            <p>&copy; 2021 All rights reserved by<a href="#">{{config("app.name")}}</a></p>
          </div>
        </div>
        <form action="{{route("logout")}}" id="logoutF" method="post" style="display: none">
          @csrf
        </form>