require('./bootstrap');
import 'jquery';
import Alpine from 'alpinejs';
import { bodyScrollLock } from './common/alpinejs';

import Router from './util/router';
import route from './routes';

const routes = new Router(route);

jQuery(document).ready(() => {
  routes.loadEvents();
  Alpine.store('mobileMenu', {
    on: false,
    toggle() {
      this.on = !this.on;
      bodyScrollLock(this.on);
    },
  });
  Alpine.start();
});
