import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock';
import Alpine from 'alpinejs';

function bodyScrollLock(boolean) {
  Alpine.store('bodyScrollLock', boolean);
  const ar = [
    document.querySelector('body'),
    document.querySelector('#global'),
  ];
  const options = {
    reserveScrollBarGap: true,
  };
  ar.forEach((el) =>
    el && boolean
      ? disableBodyScroll(el, options)
      : enableBodyScroll(el, options)
  );
}

export { bodyScrollLock };
