<template>
    <div class="wemoney_dashboard">
        <div class="x_title">
            <h2>Tạo quỹ mới</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form class="form-horizontal form-label-left ">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                           for="first-name">Tên quỹ: <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="current-user" class="form-control col-md-7 col-xs-12"
                               :value="fundName" v-model="fundName">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Người đã nộp <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12 select-users">
                        <div class="list-user" v-for="user in userData">
                            <input type="checkbox" name="checkedNames2[]" :id="user.name" :value="user.name"
                                   class="flat" v-model="checkedNames">
                            <label :for="user.name" class="check-label">
                                <div><i class="fa fa-check"></i></div>
                                {{user.name}}
                            </label>
                        </div>
                        <!--<span>Đã chọn : {{ checkedNames }}</span>-->
                    </div>
                </div>
                <div class="form-group">
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">số tiền quỹ</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input v-model="fundValue" id="date_pays" class="form-control col-md-7 col-xs-12" type="number"
                               name="middle-name">
                    </div>
                </div>
                <div class="form-group submit">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <button type="button" class="btn btn-warning submit" v-on:click="submitForm">Gửi đi</button>
                        <br/>
                        <div v-if="success == false" class="show-error alert alert-warning ">{{error_content}}</div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</template>

<script>
    export default {
        name: 'submit',
        methods: {
            submitForm: function () {
                $(".chartPreload").addClass('active');
                var self = this;
                self.success = true;
                var vueRouter = this.$router;
                var base_url = TD_Framework.base_url;
                axios.post( base_url + '/api/v1/fund', {
                    current_user: this.current_user,
                    fundName: this.fundName,
                    fundValue: this.fundValue,
                    checkedNames: JSON.stringify(this.checkedNames),
                }).then(function (response) {
                    setTimeout(function () {
                        self.data = response.data;
                        self.success = response.data.success;
                        $(".chartPreload").removeClass('active');
                        if (response.data.success) {
                            // Show total fund
                            $(".fund-balance").html(response.data.data.total_fund + ' VNĐ');
                            var account_balance = response.data.data.curent_user.money_added  - response.data.data.curent_user.amount_to_pay;
                            $(".account-balance").html(account_balance + ' VNĐ');
                            // Redirect to All record
                            vueRouter.push('fund')
                        } else {
                            self.error_content = "Nhập sai rồi, kiểm tra lại đi bạn êy...";
                        }
                    }, 500)
                }).catch(function (error) {
                    setTimeout(function () {
                        self.success = false;
                        $(".chartPreload").removeClass('active');
                        self.error_content = "Server gặp lỗi rồi, gọi Thành ngay nhá :(";
                    }, 500);
                });
            }
        },
        component: {},
        data() {
            return {
                userData: [],
                fundName: '',
                checkedNames: [],
                fundValue: 0,
                success: true
            }
        },
        // Pushes posts to the server when called.
        created() {
            $(".x_panel").addClass("preload");
            var base_url = TD_Framework.base_url;
            axios.get( base_url + '/api/v1/user/').then((response) => {
                this.userData = response.data;
                $(".x_panel").removeClass("preload");
            });
            this.current_user = TD_Framework.user;
            window.componentInstance = this;
        },
    }
</script>
<style type="text/css">

    .submit-wemoney {
        position: relative;
    }

    .show-error {
        padding: 15px;
        margin-top: 20px;
        width: 100%;
        color: #2a3f54;
        font-size: 19px;
        border-color: antiquewhite;
    }

    .list-user {
        font-size: 19px;
    }
</style>