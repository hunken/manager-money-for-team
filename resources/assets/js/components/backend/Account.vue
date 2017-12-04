<template>
    <div class="wemoney_dashboard">
        <div class="x_title">
            <h2>Các khoản đóng góp của {{current_user}}
            </h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="user-list wrap-main table-responsives">
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"
                       id="datatable-responsive" style="overflow-x:auto;">
                    <thead>
                    <tr>
                        <th  scope="col">STT</th>
                        <th scope="col">Người đóng góp</th>
                        <th scope="col">Người thanh toán</th>
                        <th scope="col">Số tiền</th>
                        <th scope="col">Chi tiết</th>
                        <th scope="col">Ngày ghi</th>
                        <th scope="col">Trích quỹ</th>
                    </tr>
                    </thead>
                    <tbody v-for="money in moneyData">
                    <tr>
                        <td data-label="STT">{{money.id}}</td>
                        <td data-label="Người đóng góp">{{money.name}}</td>
                        <td data-label="Người thanh toán">{{money.users_pay}}</td>
                        <td data-label="Số tiền">{{money.amount}}</td>
                        <td data-label="Chi tiết">{{money.detail}}</td>
                        <td data-label="Ngày ghi">{{money.created_at}}</td>
                        <td data-label="Trích quỹ">
                            <input type="checkbox"
                                   class="flat" :checked="money.is_fund">
                            <label class="check-label">
                                <div><i class="fa fa-check"></i></div>
                            </label>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'account',
        component: {},
        data() {
            return {
                moneyData: [],
                current_user: ''
            }
        },
        // Pushes posts to the server when called.
        created() {
            this.current_user = TD_Framework.user;
            var base_url = TD_Framework.base_url;
            axios.get(base_url + '/api/v1/money/' + TD_Framework.user).then((response) => {
                this.moneyData = response.data;
                $(".x_panel").removeClass("preload");
            });
        },
        computed: {
            name() {
                return 'account'
            },
        }
    }
</script>
