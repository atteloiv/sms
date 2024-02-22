<script>
import axios from "axios";

export default {
    name: "Messages",
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
        onSubmit() {
            let formData = new FormData();
            formData.append("name", this.formData.name);
            formData.append("text", this.formData.text);

            axios
                .post("/api/message", this.formData)
                .then((response) => console.log(response))
                .catch((error) => console.log(error));
        },
    },
};
</script>

<template>
    <div>
        <br /><br />
        <form @submit.prevent="onSubmit">
            <div>
                <label for="name">Name</label>
                <input type="text" id="name" v-model="formData.name" />
            </div>
            <div>
                <label for="text">Text</label>
                <input type="text" id="text" v-model="formData.text" />
            </div>
            <br />
            <button type="submit">Create</button>
        </form>
    </div>
</template>
