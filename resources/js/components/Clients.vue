<script>
import axios from "axios";

export default {
    name: "Clients",
    data() {
        return {
            formData: {
                login: "",
                psw: "",
                phones: "",
                mes: "",
            },
            tableData: [],
        };
    },
    methods: {
        onSubmit() {
            let formData = new FormData();
            formData.append("name", this.formData.name);
            formData.append("email", this.formData.phone);
            formData.append("message", this.formData.email);
            formData.append("message", this.formData.birthday);

            axios
                .post("/api/client", this.formData)
                .then((response) => console.log(response))
                .catch((error) => console.log(error));
        },
    },
    created() {
        axios
            .get("http://127.0.0.1:8000/api/client")
            .then((response) => {
                console.log(response.data);
                this.tableData = response.data;
            })
            .catch((error) => {
                console.log(error);
            });
    },
};
</script>

<template>
    <div>
        <br /><br />
        <form @submit="onSubmit">
            <div>
                <label for="login">Name</label>
                <input type="text" id="login" v-model="formData.name" />
            </div>
            <div>
                <label for="psw">Phone</label>
                <input type="text" id="psw" v-model="formData.phone" />
            </div>
            <div>
                <label for="phones">Email</label>
                <input type="text" id="phones" v-model="formData.email" />
            </div>
            <div>
                <label for="mes">Day of birth</label>
                <input type="date" id="mes" v-model="formData.birthday" />
            </div>
            <br />
            <button type="submit">Create</button>
        </form>
        <br />
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Phone</th>
                    <th>Email</th>
                    <th>Birthday</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in tableData" :key="item.id">
                    <td>{{ item.name }}</td>
                    <td>{{ item.phone }}</td>
                    <td>{{ item.email }}</td>
                    <td>{{ item.birthday }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
