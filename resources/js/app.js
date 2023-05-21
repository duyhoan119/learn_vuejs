import "./bootstrap";
import { createApp } from "vue";
import router from "./routes.js";

import Home from "./components/HomeComponent.vue";
import axios from "axios";

createApp(Home).use(router).mount("#app");

axios.defaults.baseURL = `${window.location.origin}`;