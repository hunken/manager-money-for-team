<template>
    <div class="left_col scroll-view">
        <user_badge></user_badge>
        <!-- sidebar menu -->
        <div id="sidebar-menu" class="main_menu_side hidden-print main_menu">
            <div class="menu_section active">
                <h3>Ứng dụng </h3>
                <ul class="nav side-menu" style="">
                    <li class="dactive">
                        <a href='http://wemoney.dev/dashboard#/submit'><i class="fa fa-home"></i>
                            Thêm khoản chi
                        </a>
                    </li>
                    <li><a><i class="fa fa-paper-plane"></i>Các khoản chi<span
                            class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="./dashboard/posts/add">Tất cả</a></li>
                            <li><a href="./dashboard/posts">Khoản chi của bạn</a></li>
                        </ul>
                    </li>
                    <li>
                        <a><i class="fa fa-paper-plane"></i>Hoạt động</a>
                    </li>
                    <li><a href="javascript:void(0)"><i class="fa fa-user-circle-o"></i>Người dùng<span
                            class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="./dashboard/user?action=view">Danh sách</a>
                            </li>
                            <li><a href="./dashboard/user?action=add">Thêm người dùng</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
            <div class="menu_section">
                <h3>Hệ thống</h3>
                <ul class="nav side-menu">
                    <li><a><i class="fa fa-bug"></i>Log<span class="fa fa-chevron-down"></span></a>
                        <ul class="nav child_menu">
                            <li><a href="./dashboard/system/info">Cấu hình</a></li>
                            <li><a href="./dashboard/activity">Log</a></li>
                            <li><a href="#">Nhật kí lỗi</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
        <!-- /sidebar menu -->
        <footer_sidebar/>
    </div>
</template>
<script>
    import user_badge from './user_badge.vue'
    import footer_sidebar from './footer.vue'

    export default {
        name: 'sidebar_left',
        component: {
            user_badge,
            footer_sidebar
        },
        computed: {
            name() {
                return 'sidebar_left'
            },
        }
    }
</script>