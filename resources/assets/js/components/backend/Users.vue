<template>
    <div class="wemoney_dashboard">
        <div class="x_title">
            <h2>Chi tiết
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="user-list wrap-main table-responsive">
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"  id="datatable-responsive">
                    <thead>
                    <tr>
                        <th scope="col">Email</th>
                        <th scope="col">Account</th>
                        <th scope="col">Đóng góp</th>
                        <th scope="col">Cần chi</th>
                        <th scope="col">Số dư</th>
                        <th scope="col">Ngày tạo</th>
                    </tr>
                    </thead>
                    <tbody v-for="user in userData">
                    <tr>
                        <td data-label="Email">{{user.email}}</td>
                        <td data-label="Account">{{user.name}}</td>
                        <td data-label="Đóng góp">{{user.money_added}}</td>
                        <td data-label="Cần chi">{{user.amount_to_pay}}</td>
                        <td data-label="Số dư">{{user.money_added - user.amount_to_pay}}</td>
                        <td data-label="Ngày tạo">{{user.created_at}}</td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'users',
        component: {},
        data() {
            return {
                userData: []
            }
        },
        // Pushes posts to the server when called.
        created() {
            var base_url = TD_Framework.base_url;
            axios.get( base_url + '/api/v1/user/').then((response) => {
                console.log(response.data);
                this.userData = response.data;
                $(".x_panel").removeClass("preload");
            });
        },
        computed: {
            name() {
                return 'users'
            },
        }
    }

</script>