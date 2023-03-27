let searchBlock = document.querySelector(".search");
let searchOpen = document.querySelector(".search__open");
let searchClose = document.querySelector(".search__close");

searchOpen.addEventListener("click", ()=>{
    searchBlock.classList.add("search__active");
})

searchClose.addEventListener("click", ()=>{
    searchBlock.classList.remove("search__active");
})
