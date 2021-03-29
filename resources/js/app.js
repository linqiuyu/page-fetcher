require('./bootstrap');

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */
import App from './App';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';
import { router } from './router';
import { i18n } from './i18n';

Vue.use(ElementUI);

const app = new Vue({
    router,
    i18n,
    el: '#app',
    render: h => h(App)
});