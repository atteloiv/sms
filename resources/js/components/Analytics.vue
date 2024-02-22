<script>
import axios from "axios";

export default {
    name: "Analytics",
    data() {
        return {
            tableData: [],
        };
    },
    created() {
        axios
            .get("http://127.0.0.1:8000/api/message")
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
        <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name</th>
                    <th>Status</th>
                    <th>Send</th>
                    <th>Delivered</th>
                </tr>
            </thead>
            <tbody>
                <tr v-for="item in tableData" :key="item.id">
                    <td>{{ item.id }}</td>
                    <td>{{ item.name }}</td>
                </tr>
            </tbody>
        </table>
    </div>
</template>
