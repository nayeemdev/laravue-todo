require("./bootstrap");

window.Vue = require("vue");
import Form from "./form";
window.Form = Form;
import VueNotifications from "vue-notifications";
import iziToast from "izitoast";
import "izitoast/dist/css/iziToast.min.css";

function toast({ title, message, type, timeout, position, cb }) {
    if (type === VueNotifications.types.warn) type = "warning";
    return iziToast[type]({ title, message, timeout, position });
}

const options = {
    success: toast,
    error: toast,
    info: toast,
    warn: toast
};

Vue.use(VueNotifications, options);

Vue.component(
    "todo-component",
    require("./components/TodoComponent.vue").default
);

const app = new Vue({
    el: "#app"
});
