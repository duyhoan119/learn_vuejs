import "./bootstrap";
import { createApp } from "vue";
import router from "./routes.js";

import Home from "./components/Admin/HomeComponent.vue";

createApp(Home).use(router).mount("#app");
