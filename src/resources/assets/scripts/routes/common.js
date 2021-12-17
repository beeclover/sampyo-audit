import Headroom from 'headroom.js';
import shrink from '../functions/shrink';

const common = {
  containerInit() {},
  init() {
    const targetEl = document.querySelector('#headroom');
    const headroom = new Headroom(targetEl);
    headroom.init();
    $(window).scroll(function () {
      shrink('header.header__main');
    });
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};

export default common;
