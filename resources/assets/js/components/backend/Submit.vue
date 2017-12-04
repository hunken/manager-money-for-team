<template>
    <div class="wemoney_dashboard">
        <div class="x_title">
            <h2>Thêm khoản chi</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form class="form-horizontal form-label-left ">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                           for="first-name">Người thanh toán : <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="current-user" disabled class="form-control col-md-7 col-xs-12"
                               :value="current_user" v-model="current_user">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Người chi trả <span
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
                    <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Ngày chi</label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input v-model="datePay" id="date_pays" class="form-control col-md-7 col-xs-12" type="date"
                               name="middle-name">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Số tiền chi ( Đơn vị : Nghìn đồng ) : <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input v-model="amount" id="money" name="money" class="form-control col-md-7 col-xs-12"
                               required="required"
                               type="number"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Chi tiết thanh toán : <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <textarea id="detail" name="detail" class="form-control col-md-7 col-xs-12" required="required"
                                  type="text" v-model="detailData"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> Tiền ăn : <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12 cooking">
                        <input type="checkbox" name="tienan" id="tienan" class="flats" v-model="cooking">
                        <label for="tienan" class="check-label">
                            <div><i class="fa fa-check"></i></div>
                        </label>
                        <div v-show="cooking" class="desc-cooking">
                            Ồ, nấu cơm à, yêu chế yêu chế :P - bác được discount 20%. À, tích bừa bị phát hiện, là tự động trừ ngay 20k nhé.
                        </div>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> Trích từ quỹ ? : <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12 cooking">
                        <input type="checkbox" name="is_fund" id="is_fund" class="flats" v-model="is_fund">
                        <label for="is_fund" class="check-label">
                            <div><i class="fa fa-check"></i></div>
                        </label>
                        <div v-show="is_fund" class="desc-cooking">
                            Khoản thanh toán này được trích từ quỹ chung.
                        </div>
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
                axios.post( base_url + '/api/v1/money', {
                    current_user: this.current_user,
                    detailData: this.detailData,
                    amount: this.amount,
                    datePay: this.datePay,
                    checkedNames: JSON.stringify(this.checkedNames),
                    cooking: this.cooking,
                    is_fund: this.is_fund
                }).then(function (response) {
                    console.log(response);
                    setTimeout(function () {
                        self.data = response.data;
                        self.success = response.data.success;
                        $(".chartPreload").removeClass('active');
                        if (response.data.success) {
                            $(".account-balance").html(response.data.data.balance + ' VNĐ');
                            $(".fund-balance").html(response.data.data.fund_balance + ' VNĐ');
                            // Redirect to All record
                            vueRouter.push('all')
                        } else {
                            self.error_content = "Nhập sai rồi, kiểm tra lại đi bạn êy...";
                        }
                    }, 500)
                }).catch(function (error) {
                    console.log(error);
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
                detailData: '',
                checkedNames: [],
                datePay: '',
                amount: 0,
                current_user: '',
                cooking: false,
                is_fund: true,
                success: true,
                error_content: ''
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
        mounted() {
            console.log('Đã load xong');
        },
//      computed: {
//            name() {
//                return 'submit'
//            }
//        }
    }
</script>
<style type="text/css">
    .desc-cooking {
        font-size: 17px;
        font-style: italic;
    }

    .cooking input {
        margin-top: 10px;
    }

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