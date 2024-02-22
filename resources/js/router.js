import { createRouter, createWebHashHistory } from "vue-router";
import Analytics from "./components/Analytics.vue";
import Clients from "./components/Clients.vue";
import Messages from "./components/Messages.vue";

export default createRouter({
    history: createWebHashHistory(),
    routes: [
        { path: "/analytics", component: Analytics },
        { path: "/clients", component: Clients },
        { path: "/messages", component: Messages },
    ],
});
