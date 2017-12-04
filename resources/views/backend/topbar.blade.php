
<div class="nav_menu">
    <nav>
        <div class="nav toggle">
            <a id="menu_toggle"><i class="fa fa-bars"></i></a>
        </div>
        <ul class="nav navbar-nav navbar-right">
            <li class="">
                <a href="javascript:;" class="user-profile dropdown-toggle" data-toggle="dropdown" data-target=".dropdown-menu" >
                    @if(Auth::user()->money_added - Auth::user()->amount_to_pay  > 0)
                        <img src="{{env('APP_URL')}}/img/user-haha.png" alt="...">
                    @else
                        <img src="{{env('APP_URL')}}/img/user-cry.png" alt="..." >
                    @endif
                        {{Auth::user()->name}}
                    <span class=" fa fa-angle-down"></span>
                </a>
                <ul class="dropdown-menu dropdown-usermenu pull-right">
                    <li><a href="#password"> Profile <span class="badge bg-red pull-right">Update</span></a></li>
                    <li><a href="javascript:;">Help</a></li>
                    <li><a href="{{env('APP_URL')}}/logout"><i class="fa fa-sign-out pull-right"></i> Log Out</a></li>
                </ul>
            </li>
        </ul>
    </nav>
</div>
