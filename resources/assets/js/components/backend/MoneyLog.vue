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
                        <th scope="col">STT</th>
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
                        <td data-label="Người đóng góp" >{{money.name}}</td>
                        <td data-label="Người thanh toán">{{money.users_pay}}</td>
                        <td data-label="Số tiền">{{money.amount}}</td>
                        <td data-label="Chi tiết">{{money.detail}}</td>
                        <td data-label="Ngày ghi">{{money.created_at}}</td>
                        <td data-label="Trích quỹ">
                            <input type="checkbox"
                                   class="flat"  :checked="money.is_fund">
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
        name: 'moneylog',
        component: {},
        data() {
            return {
                moneyData: []
            }
        },
        // Pushes posts to the server when called.
        created() {
            var base_url = TD_Framework.base_url;
            axios.get(base_url + '/api/v1/money/').then((response) => {
                $(".x_panel").removeClass("preload");
                this.moneyData = response.data;
            });
        },
        computed: {
            name() {
                return 'users'
            },
        }
    }

</script>