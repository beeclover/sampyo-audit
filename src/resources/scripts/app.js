/**
 * External Dependencies
 */
import 'jquery';
import Headroom from 'headroom.js';

$(() => {
  const targetEl = document.querySelector('#headroom');
  const headroom = new Headroom(targetEl);
  headroom.init();
});
