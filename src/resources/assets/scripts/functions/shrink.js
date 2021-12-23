export default (target, scroll = window.pageYOffset, shrinkHeader = 80) => {
  if (scroll >= shrinkHeader) {
    $(target).addClass('shrink');
  } else {
    $(target).removeClass('shrink');
  }
};
