export default (
  target,
  scroll = window.pageYOffset || document.documentElement.scrollTop,
  shrinkHeader = document.querySelector('.section.hero')?.offsetHeight ?? 40
) => {
  if (scroll >= shrinkHeader) {
    $(target).addClass('shrink');
  } else {
    $(target).removeClass('shrink');
  }
};
