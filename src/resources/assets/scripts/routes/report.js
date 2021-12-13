import { createApp } from 'vue';
import Form from '../components/Form';

const common = {
  containerInit() {},
  init() {
    const app = createApp({});
    app.component('vue-form', Form).mount('#form');
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};

export default common;
