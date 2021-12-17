require('./bootstrap');
import 'jquery';
import Alpine from 'alpinejs';

import Router from './util/router';
import route from './routes';

const routes = new Router(route);

jQuery(document).ready(() => {
  routes.loadEvents();
  Alpine.start();
});
