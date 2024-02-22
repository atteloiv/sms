<script>
export default {
    mounted() {
        console.log("Component mounted.");
    },
};
</script>

<template>
    <div class="container">
        <div class="menu">
            <router-link class="text" to="/analytics">Аналитика</router-link>
            <router-link class="text" to="/clients">Клиенты</router-link>
            <router-link class="text" to="/messages">Рассылка</router-link>
        </div>
        <div class="content">
            <router-view></router-view>
        </div>
    </div>
</template>

<style>
body,
html {
    height: 100%;
    margin: 0;
}
.container {
    display: flex;
    min-height: 100vh;
}

.menu {
    width: 280px;
    background-color: #f6f8fa;
    padding-top: 64px;
    box-sizing: border-box;
    min-height: 100vh;
}

.text {
    display: block;
    margin-bottom: 15px;
    text-decoration: none;
    color: #333;
    margin-left: 80px;
    font-size: 18px;
}

.text:hover {
    color: #f6f8fa;
}

.content {
    flex-grow: 1;
    padding: 20px;
    box-sizing: border-box;
}
input {
    width: 514px;
    height: 25px;
    padding-left: 10px;
    padding-right: 10px;
    margin-top: 5px;
    margin-bottom: 10px;
    border: 1px #e0e7ec;
    border-radius: 6px;
    box-shadow: 0 2px 4px #5c656f4d;
}
label {
    display: block;
    margin-top: 10px;
}
button {
    width: 200px;
    height: 30px;
    border-radius: 8px;
    margin-top: 10px;
    background-color: rgb(51, 154, 240);
    color: white;
    border: none;
    transition: all 0.1s ease-in-out;
}
button:hover {
    transform: scale(1.05);
}
body {
    font-family: Arial, sans-serif;
}

table {
    width: 100%;
    max-width: 1000px;
    border-collapse: collapse;
    margin-top: 40px;
}

th,
td {
    padding: 10px;
    text-align: left;
    border-bottom: 2px solid #dce4ea;
    color: #252733;
}
tr:hover {
    background-color: #ddd;
}
</style>
