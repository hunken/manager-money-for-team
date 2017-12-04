<div id="left-sidebar" data-user="{{Auth::user()->fullname}}" data-url="{{env('APP_URL')}}/dashboard/"
     class="col-md-3 left_col">
    <div class="left_col scroll-view" id="left-sidebar">
        <div class="navbar nav_title" style="border: 0;">
            <a href="{{env('APP_URL')}}/dashboard/" class="site_title"><i class="fa fa-line-chart"></i>
                <span>WeMoney</span></a>
        </div>
        <div class="clearfix"></div>
        @include("backend.user-badge")
        <br>
        <style type="text/css">
            .span.fund-balance {
                border: 1px solid #ccc;
                padding: 5px;
                margin: 15px;
                margin-top: 20px;
                border-radius: 15px;
                background: #ccc;
                width: 100%;
                position: relative;
            }

        </style>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section active">
                <h3 class="balance">SỐ DƯ CỦA BẠN : <span class='account-balance' style="font-size: 18px">{{Auth::user()->money_added - Auth::user()->amount_to_pay}}
                        K vnđ</span></h3>
                <span class='fund-balance' style="font-size: 18px">{{$total_fund}}
                    K vnđ</span>
                <ul class="nav side-menu" style="">
                    <li class="dactive">
                        <a href='#submit'><i class="fa fa-bolt"></i>
                            Thêm khoản chi
                        </a>
                    </li>
                    <li><a><i class="fa fa-paper-plane"></i>Các khoản chi<span
                                    class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#all">Tất cả</a></li>
                            <li><a href="#account">Khoản chi của bạn</a></li>
                        </ul>
                    </li>
                    <li><a><i class="fa fa-money"></i>Qũy<span
                                    class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#fund">Danh sách</a></li>
                            <li><a href="#addfund">Tạo quỹ mới</a></li>
                        </ul>
                    </li>
                    <li><a href="#users"><i class="fa fa-user-circle-o"></i>Thành viên băng đảng</a>
                    </li>
                    <li><a href="https://www.facebook.com/groups/123375638382015/" target="_blank"><i
                                    class="fa fa-facebook"></i>Group facebook</a></li>
                    <li>
                        <a href="#activities"><i class="fa fa-paper-plane"></i>Hoạt động<span
                                    class="label label-success pull-right">Soon</span></a>
                    </li>
                    <li>
                        <a href="#statistics"><i class="fa fa-area-chart"></i>Bảng xếp hạng<span
                                    class="label label-success pull-right">Soon</span></a>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Hệ thống</h3>
                <ul class="nav side-menu">
                    <li><a href="#password"><i class="fa fa-user-circle"></i>Thông tin tài khoản</a>
                    <li><a href="#add-user"><i class="fa fa-address-card"></i>Thêm người dùng</a>
                    </li>
                    <li><a><i class="fa fa-bug"></i>Log<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="#system">Cấu hình</a></li>
                            <li><a href="#log">Log</a></li>
                            <li><a href="#error">Nhật kí lỗi</a></li>
                        </ul>
                    </li>

                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->

        <!-- /menu footer buttons -->
        <div class="sidebar-footer hidden-small">
            <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Settings">
                <span class="glyphicon glyphicon-cog" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="" data-original-title="FullScreen">
                <span class="glyphicon glyphicon-fullscreen" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="" data-original-title="Lock">
                <span class="glyphicon glyphicon-eye-close" aria-hidden="true"></span>
            </a>
            <a data-toggle="tooltip" data-placement="top" title="" href="{{env('APP_URL')}}/logout"
               data-original-title="Logout">
                <span class="glyphicon glyphicon-off" aria-hidden="true"></span>
            </a>
        </div>
        <!-- /menu footer buttons -->
    </div>
</div>
