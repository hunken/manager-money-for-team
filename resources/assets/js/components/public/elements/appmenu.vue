<template>
    <div class="topmenu">
        <nav class="main-navigation">
            <ul class="menu">
                <li class="menu-item menu-item-has-children" v-for="item in menuItems">
                    <a v-bind:href="item.id">
                        {{ item.name }}
                    </a>
                </li>
            </ul>
        </nav>
    </div>
</template>
<script>
    export default {
        name: 'appmenu',
        data: () => ({
            menuItems: [
                {
                    id: "http://core.dev",
                    name: 'Home'
                },
                {
                    id: "posts",
                    name: 'Posts'
                },

            ]
        }),
    }
</script>