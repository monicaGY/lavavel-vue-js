import './bootstrap';
import { createApp } from 'vue';
import ProductosComponent from'./components/ProductosComponent.vue';
import FormComponent from'./components/FormComponent.vue';
import FormCreateComponent from'./components/FormCreateComponent.vue';

const app = createApp({});
app.component('productos-component', ProductosComponent);
app.mount('#producto');

const form = createApp({});
form.component('form-component', FormComponent);
form.mount('#edit');

const form_create = createApp({});
form_create.component('form-create-component', FormCreateComponent);
form_create.mount('#create');

