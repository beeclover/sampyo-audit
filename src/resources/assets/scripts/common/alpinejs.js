import { disableBodyScroll, enableBodyScroll } from 'body-scroll-lock';

function bodyScrollLock(boolean) {
  const body = document.querySelector('body');
  const header = document.querySelector('header#global');
  const options = {
    reserveScrollBarGap: true,
  };
  if (boolean) {
    disableBodyScroll(body, options);
    disableBodyScroll(header, options);
  } else {
    enableBodyScroll(body, options);
    enableBodyScroll(header, options);
  }
}

export { bodyScrollLock };
