/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');


window.Vue = require('vue').default;



Vue.component('example', require('./components/ExampleComponent.vue').default);
Vue.component('cotizaciones', require('./components/Cotizaciones.vue').default);
Vue.component('clientes', require('./components/Clientes.vue').default);
Vue.component('productos', require('./components/Productos.vue').default);
Vue.component('categorias', require('./components/Categorias.vue').default);
Vue.component('proveedores', require('./components/Proveedores.vue').default);
Vue.component('producto_precios', require('./components/ProductoPrecios.vue').default);

Vue.component('select2', require('./components/Select2.vue').default);




const app = new Vue({
    el: '#app',
});
