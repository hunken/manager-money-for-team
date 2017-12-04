<template>
    <div class="wemoney_dashboard">
        Phần này sẽ ghi lại các hoạt động của mọi người như thêm bản ghi mới hay xóa đi 1 bản ghi.
    </div>
</template>
<script>
    export default {
        name: 'activities',
        component: {},
        data() {
            return {
            }
        },
        // Pushes posts to the server when called.
        created() {

        },
        computed: {
            name() {
                return 'activities'
            },
        }
    }

</script>