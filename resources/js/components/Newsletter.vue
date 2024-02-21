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
    // methods: {
    //     createPost() {
    //         axios
    //             .post("https://smsc.ru/sys/send.php", this.formData)
    //             .then((response) => console.log(response))
    //             .catch((error) => console.log(error));
    //     },
    // },

    methods: {
        onSubmit: async (form) => {
            const formData = new FormData(form);
            const res = await fetch("/api/some-utl", {
                method: "POST",
                body: formData,
            });
        },
    },
};
</script>

<template>
    <div>
        <br /><br />
        <form @submit.prevent="onSubmit">
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
            <button type="submit">Create</button>
        </form>
    </div>
</template>
