<template>
    <div class="wemoney_dashboard">

        <div class="x_title">
            <h2>Cập nhật tài khoản</h2>
            <div class="clearfix"></div>
        </div>
        <div class="x_content">
            <form class="form-horizontal form-label-left ">
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"
                           for="current-user">Tài khoản : <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input type="text" id="current-user" disabled class="form-control col-md-7 col-xs-12"
                               :value="current_user" v-model="current_user">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Mật khẩu : <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input v-model="password" id="password" name="password" class="form-control col-md-7 col-xs-12"
                               required="required"
                               type="password"/>
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12">Nhập lại mật khẩu <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12">
                        <input id="password_confirmation" name="password_confirmation"
                               class="form-control col-md-7 col-xs-12"
                               required="required"
                               type="password" v-model="password_confirmation ">
                    </div>
                </div>
                <div class="form-group">
                    <label class="control-label col-md-3 col-sm-3 col-xs-12"> Full name: <span
                            class="required">*</span>
                    </label>
                    <div class="col-md-6 col-sm-6 col-xs-12 ">
                        <input type="text" name="fullname" class="form-control col-md-7 col-xs-12" id="fullname"
                               v-model="fullname">
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
        name: 'password',
        component: {},
        data() {
            return {
                current_user: '',
                fullname: '',
                password: '',
                password_confirmation: '',
                success: true
            }
        },
        methods: {
            submitForm: function () {
                $(".chartPreload").addClass('active');
                var self = this;
                self.success = true;
                var vueRouter = this.$router;
                var base_url = TD_Framework.base_url;
                axios.post(base_url + '/api/v1/user/password', {
                    current_user: this.current_user,
                    fullname: this.fullname,
                    password: this.password,
                    password_confirmation: this.password_confirmation,
                }).then(function (response) {
                    console.log(response);
                    setTimeout(function () {
                        self.data = response.data;
                        self.success = response.data.success;
                        $(".chartPreload").removeClass('active');
                        if (response.data.success) {
                            vueRouter.push('password')
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
            },
        },
        // Pushes posts to the server when called.
        created() {
            this.current_user = TD_Framework.user;
        },
        mounted() {
            $(".x_panel").removeClass("preload");
        },
        computed: {
            name() {
                return 'password'
            },
        }
    }
</script>