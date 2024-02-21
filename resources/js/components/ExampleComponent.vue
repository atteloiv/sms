<script>
export default {
    mounted() {
        console.log("Component mounted.");
    },
};
</script>

<template>
    <div class="menu">
        <div class="">
            <router-link class="text" to="/analytics">Аналитика</router-link>
            <br />
            <router-link class="text" to="/clients">Клиенты</router-link>
            <br />
            <router-link class="text" to="/newsletter">Рассылка</router-link>
        </div>
        <div class="container">
            <router-view></router-view>
        </div>
    </div>
</template>
