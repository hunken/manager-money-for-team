// Containers
import Vue from 'vue';
import Router from 'vue-router';

Vue.component('Submit', require('../components/backend/Submit.vue'));
Vue.component('App', require('../components/backend/App.vue'));
Vue.component('Account', require('../components/backend/Account.vue'));
Vue.component('Activities', require('../components/backend/Activity.vue'));
Vue.component('Statistic', require('../components/backend/Statistics.vue'));
Vue.component('AddFund', require('../components/backend/AddFund.vue'));
Vue.component('ListFund', require('../components/backend/ListFund.vue'));
Vue.component('Password', require('../components/backend/Password.vue'));

import App from '../components/backend/App.vue';
import Submit from '../components/backend/Submit.vue';
import AddUser from '../components/backend/AddUser.vue';
import Users from '../components/backend/Users.vue';
import Account from '../components/backend/Account.vue';
import Activities from '../components/backend/Activity.vue';
import Statistics from '../components/backend/Statistics.vue';
import AddFund from '../components/backend/AddFund.vue';
import ListFund from '../components/backend/ListFund.vue';
import Password from '../components/backend/Password.vue';

Vue.use(Router);
export default new Router({
    //mode: 'history',
    routes: [
        {
            path: '/',
            name: 'Dashboard',
            component: Submit
        },
        {
            path: '/all',
            name: 'AllLog',
            component: App
        },
        {
            path: '/account',
            name: 'Account',
            component: Account
        },
        {
            path: '/submit',
            name: 'Submit',
            component: Submit
        },
        {
            path: '/users',
            name: 'Users',
            component: Users
        },
        {
            path: '/add-user',
            name: 'AddUser',
            component: AddUser
        },
        {
            path: '/activities',
            name: 'Activities',
            component: Activities

        },
        {
            path: '/statistics',
            name: 'Statistics',
            component: Statistics

        },
        {
            path: '/addfund',
            name: 'AddFund',
            component: AddFund

        },
        {
            path: '/fund',
            name: 'ListFund',
            component: ListFund

        },
        {
            path: '/password',
            name: 'Password',
            component: Password

        }
    ]
})