let burgerMenu = document.querySelector(".header__burger");
let burgerBlock = document.querySelector(".nav-mobile");

burgerMenu.addEventListener("click", () => {
  burgerBlock.classList.toggle("mobile__active");
  burgerMenu.classList.toggle("burger__active");
  document.body.classList.toggle("overflow-hidden");
});
