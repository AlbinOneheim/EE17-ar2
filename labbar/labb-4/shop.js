function start() {
/* Element som vi jobbar med */
    const eMinus = document.querySelector("#minus");
    const ePlus = document.querySelector("#plus");
    const eAntal = document.querySelector("#antal");

/* vad händer när man trycker på kanpparna */
    ePlus.addEventListener("click", plussa);
    function plussa() {
        var antal = parseInt(eAntal.textContent);
        antal = antal + 1;
        eAntal.textContent = antal; 
    }
    eMinus.addEventListener("click", minusa);
    function minusa() {
        var antal = parseInt(eAntal.textContent);
        antal = antal - 1;
        eAntal.textContent = antal;
    }
}
start();