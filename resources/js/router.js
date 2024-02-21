import { createRouter, createWebHashHistory } from "vue-router";
import Analytics from "./components/Analytics.vue";
import Clients from "./components/Clients.vue";
import Newsletter from "./components/Newsletter.vue";

export default createRouter({
    history: createWebHashHistory(),
    routes: [
        { path: "/analytics", component: Analytics },
        { path: "/clients", component: Clients },
        { path: "/newsletter", component: Newsletter },
    ],
});
