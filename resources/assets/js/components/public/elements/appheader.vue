<template>
    <!--HEADER-->
    <header class="header hidden-xs hidden-sm header--01">
        <div class="header__topbar">
            <div class="container">
                <div class="row">
                    <div class="col-sm-6">
                        <ul class="topbar-links">
                            <li class="menu-item">
                                <a href="tel:+84436833333">+84 436.833.333</a>
                            </li>
                            <li class="menu-item">
                                <a href="mailto:support@themespond.com">support@themespond.com</a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-sm-6">
                        <div class="account">
                            <div class="account__login-register">
                            <span class="login" data-toggle="modal" data-target="#myModal">
                                <a href="#">
                                    <i class="fa fa-user-circle" aria-hidden="true"></i>
                                    Login
                                </a>
                            </span>
                                <span class="register" data-toggle="modal" data-target="#myModal">
                                <a href="#">
                                    Register
                                </a>
                            </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="box-site-branding">
            <div class="site-branding">
                <div class="wrap">
                    <a href="index.html" class="custom-logo-link" rel="home">
                        <!--<img src="./assets/images/logo/logo1.png" class="custom-logo" alt="logo">-->
                    </a>
                    <div class="site-branding-text">
                        <h1 class="site-title">
                            <a href="#" rel="home">HEADER</a>
                        </h1>
                        <p class="site-description">Header</p>
                    </div>
                    .site-branding-text
                </div>
                .wrap
            </div>
        </div>

        <div class="header__mainbar text-center">
            <div class="container pos-relative">
                <appmenu></appmenu>
            </div>
        </div>
    </header>
    <!--HEADER-->
</template>

<script>
    import appmenu from "./appmenu.vue"
    export default {
        name: 'appheader',
        component: {
            appmenu,
        },
        computed: {
            name() {
                return 'appheader'
            },
        }
    }
</script>