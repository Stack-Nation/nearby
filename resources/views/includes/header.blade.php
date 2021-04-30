
    <!-- Footer Nav-->
    <div class="footer-nav-area" id="footerNav">
      <div class="container px-0">
        <!-- Paste your Footer Content from here-->
        <!-- Footer Content-->
        <div class="footer-nav position-relative">
          <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
            <li class="@if(Request::route()->getName()=="index") active @endif"><a href="{{route("index")}}"><span>Home</span></a></li>
            <li class="@if(Request::route()->getName()=="apply-volunteer") active @endif"><a href="{{route("apply-volunteer")}}"><span>Apply for volunteering</span></a></li>
          </ul>
        </div>
      </div>
    </div>