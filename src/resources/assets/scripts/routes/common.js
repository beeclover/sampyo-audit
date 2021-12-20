import Headroom from 'headroom.js';
import shrink from '../functions/shrink';
import { bodyScrollLock } from '../common/alpinejs';

const common = {
  containerInit() {},
  init() {
    const targetEl = document.querySelector('#global');
    const headroom = new Headroom(targetEl);
    headroom.init();
    $(window).scroll(function () {
      shrink('header.header__main');
    });
    window.bodyScrollLock = bodyScrollLock;
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};

export default common;
