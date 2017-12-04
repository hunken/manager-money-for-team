/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
Vue.config.debug = true;
Vue.component('footer_sidebar', require('./components/backend/sidebar/footer.vue'));
Vue.component('user_badge', require('./components/backend/sidebar/user_badge.vue'));
Vue.component('sidebar_left', require('./components/backend/sidebar/sidebar_left.vue'),{
    props: ["dataFromParent"]
});
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const sidebar_left = new Vue({
    el: '#left-sidebar',
    data:{
        'base_url' : $("#left-sidebar").data('url'),
    }
});