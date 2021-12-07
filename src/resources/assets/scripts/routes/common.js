import Headroom from 'headroom.js';

const common = {
  containerInit() {},
  init() {
    const targetEl = document.querySelector('#headroom');
    const headroom = new Headroom(targetEl);
    headroom.init();
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};

export default common;
