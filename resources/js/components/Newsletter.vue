<script>
import axios from "axios";

export default {
    name: "Newsletter",
    data() {
        return {
            formData: {
                login: "",
                psw: "",
                phones: "",
                mes: "",
            },
        };
    },
    methods: {
        createPost() {
            axios
                .post("https://smsc.ru/sys/send.php", this.formData)
                .then((response) => console.log(response))
                .catch((error) => console.log(error));
        },
    },
};
</script>

<template>
    <div>
        <br /><br />
        <form @submit.prevent="createPost">
            <div>
                <label for="login">login</label>
                <input type="text" id="login" v-model="formData.login" />
            </div>
            <div>
                <label for="psw">psw</label>
                <input type="text" id="psw" v-model="formData.psw" />
            </div>
            <div>
                <label for="phones">phones</label>
                <input type="text" id="phones" v-model="formData.phones" />
            </div>
            <div>
                <label for="mes">mes</label>
                <input type="text" id="mes" v-model="formData.mes" />
            </div>
            <br />
            <button>Create</button>
        </form>
    </div>
</template>
