import Vue from 'vue';
import VueRouter from 'vue-router';
import ExampleComponent from "./components/ExampleComponent";
import ContactsCreate from './views/ContactsCreate';
import ContactsShow from './views/ContactsShow';
import ContactsEdit from './views/ContactsEdit';
import ContactsIndex from './views/ContactsIndex';

Vue.use(VueRouter);

export default new VueRouter({
    routes: [
        { path: '/', component: ExampleComponent },
        { path: '/contacts', component: ContactsIndex },
        { path: '/contacts/create', component: ContactsCreate },
        { path: '/contacts/:id/edit', component: ContactsEdit },
        { path: '/contacts/:id', component: ContactsShow },
    ],
    mode: 'history'
})
