 <!--sidebar start-->
 <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu">                
                  <li class="">
                      <a class="" href="{{ route('dashboard') }}">
                          <i class="icon_house_alt"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li>
                      <a class="{{ route('driver.list') }}" href="">
                          <i class="icon_id-2_alt "></i>
                          <span>Drivers</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" class="">
                          <i class="icon_book"></i>
                          <span>Bookings</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                          <li><a class="" href="{{ route('booking.new') }}"><i class="icon_plus"></i>New Booking</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">                     
                      <a href="javascript:;" class="" >
                          <i class="icon_group"></i>
                          <span>Consignees</span>
                          <span class="menu-arrow arrow_carrot-right"></span>
                      </a>
                      <ul class="sub">
                        <li><a href="{{ route('consignee.new') }}"><i class="icon_plus"></i>New Consignee</a></li>
                      </ul>               
                  </li>
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
 <!--sidebar end-->