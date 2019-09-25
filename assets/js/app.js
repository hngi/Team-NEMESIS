const showMobileNav = () => {
  const nav = document.querySelector(".js-nav");
  const hamburger = document.querySelector(".js-hamburger");

  hamburger.addEventListener("click", e => {
    nav.classList.toggle("nav--open");
  });
};

showMobileNav();
