<template>
    <div class="wemoney_dashboard">
        <div class="x_title">
            <h2>Thống kê chi tiêu quỹ</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <div class="user-list wrap-main table-responsive">
                <table class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0" width="100%"  id="datatable-responsive">
                    <thead>
                    <tr>
                        <th scope="col">STT</th>
                        <th scope="col">Quỹ</th>
                        <th scope="col">Số tiền/người</th>
                        <th scope="col">Người đã đóng</th>
                        <th scope="col">Ngày tạo</th>
                        <th scope="col">Loại</th>
                    </tr>
                    </thead>
                    <tbody v-for="fund in Funds">
                    <tr>
                        <td data-label="STT">{{fund.id}}</td>
                        <td data-label="Quỹ">{{fund.name}}</td>
                        <td data-label="Số tiền/người">{{fund.value}}</td>
                        <td data-label="Người đã đóng">{{fund.users}}</td>
                        <td data-label="Ngày tạo">{{fund.created_at}}</td>
                        <td data-label="Loại"><span v-if="!fund.is_pay">Nộp quỹ</span> <span v-if="fund.is_pay">Chi tiêu</span></td>
                    </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</template>
<script>
    export default {
        name: 'listfund',
        component: {},
        data() {
            return {
                Funds: []
            }
        },
        // Pushes posts to the server when called.
        created() {
            var base_url = TD_Framework.base_url;
            axios.get( base_url + '/api/v1/fund/').then((response) => {
                this.Funds = response.data;
                $(".x_panel").removeClass("preload");
            });
        },
        computed: {
            name() {
                return 'listfund'
            },
        }
    }

</script>