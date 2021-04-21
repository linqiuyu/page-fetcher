import Vue from 'vue';
import VueRouter from 'vue-router';
import ExampleComponent from "./components/ExampleComponent";
import Rule from "./components/Rule";
import AddRule from "./components/AddRule";

Vue.use(VueRouter);

const router = new VueRouter({
    mode: 'hash',
    routes: [
        { path: '/', name: 'home', component: ExampleComponent },
        { path: '/rules', name: 'rules', component: ExampleComponent },
        { path: '/rule', name: 'rule', component: Rule },
        { path: '/add-rule', name: 'add-rule', component: AddRule },
    ]
})

export {
    router
};
