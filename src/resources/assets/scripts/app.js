require('./bootstrap');
import 'jquery';
import Alpine from 'alpinejs';

import Router from './util/router';
import * as route from './routes';

const routes = new Router({
  // All pages
  common: route.common,
  createReport: route.report,
  signup: route.signup,
});

jQuery(document).ready(() => {
  routes.loadEvents();
  Alpine.start();
});
