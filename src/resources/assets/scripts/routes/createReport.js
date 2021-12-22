import { createApp } from 'vue';
import Form from '../components/Form/Editor';
import Alpine from 'alpinejs';

const common = {
  containerInit() {},
  init() {
    const app = createApp({});
    app.component('vue-form', Form).mount('#form');

    const url = new URL(window.location.href);
    const search = url.searchParams;
    const posting = search.get('posting');
    if (posting === 'done') {
      Alpine.store('posting', true);
    }
  },
  finalize() {
    // JavaScript to be fired on all pages, after page specific JS is fired
  },
};

export default common;
