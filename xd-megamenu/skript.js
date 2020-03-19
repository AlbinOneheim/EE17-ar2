/* element vi använder */
const overlay = document.querySelector("#overlay");
const closeMenu = document.querySelector("#close-menu");
const openMenu = document.querySelector("#open-menu");

/* vad händer när man klickar på hamburgar-meny*/
openMenu.addEventListener("click", toggleOverlay);

/* vad händer när man klickar på kryss-meny */
closeMenu.addEventListener("click", toggleOverlay);


function toggleOverlay() {
    overlay.classList.toggle("show-menu");
}

