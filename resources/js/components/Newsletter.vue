<!-- <script>
import { defineComponent } from '@vue/composition-api'

export default defineComponent({
    setup() {

    },
})
</script> -->

<script>
import axios from "axios";

export default {
    name: "Newsletter",
    data() {
        return {
            formData: {
                userId: "",
                title: "",
                body: "",
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
                <label for="userId">User ID: </label>
                <input type="text" id="userId" v-model="formData.userId" />
            </div>
            <div>
                <label for="title">title</label>
                <input type="text" id="title" v-model="formData.title" />
            </div>
            <div>
                <label for="body">body</label>
                <input type="text" id="body" v-model="formData.body" />
            </div>
            <br />
            <button>Create</button>
        </form>
    </div>
</template>
