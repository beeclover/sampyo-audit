require('./bootstrap');
import 'jquery';
import Alpine from 'alpinejs';

import Router from './util/router';
import * as route from './routes';

import { createApp } from 'vue';
import HelloWorld from './components/HelloWorld.vue';

const app = createApp({});
app.component('hello-world', HelloWorld).mount('#app');

const routes = new Router({
  // All pages
  common: route.common,
});

jQuery(document).ready(() => {
  routes.loadEvents();
  Alpine.start();
});
