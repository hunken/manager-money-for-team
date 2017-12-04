<template>
    <!--<router-view></router-view>-->
    <div class="wrap-main">
        <appheader></appheader>
        <div class="site-content-contain">
            <div  class="site-content container site-margin">
                <div class="site-content-contain">
                    <div class="container">
                        <!--Breadcrumb-->
                    </div>
                    <div id="content" class="site-content container site-margin">
                        <div class="wrap row">
                            <div id="primary" class="content-area col-md-9">
                                CONTENT HOME
                            </div>
                            <aside id="secondary" class="sidebar col-md-3">
                                <left_sidebar></left_sidebar>
                            </aside>
                        </div>
                    </div>
                    Footer
                </div>
            </div>
        </div>
    </div>
</template>
<script>
    import left_sidebar from "./left_sidebar.vue"
    import appheader from "./elements/appheader.vue"
    import post_detail from "./posts/detail.vue"
    export default {
        name: 'app',
        component: {
            appheader,
        },
        computed: {
            name() {
                return 'app'
            },
        }
    }

</script>