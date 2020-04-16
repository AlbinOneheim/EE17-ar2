/* Element vi jobbar med */
const eCanvas = document.querySelector("canvas");

/* Skapa canvas */
var ctx = eCanvas.getContext("2d");
eCanvas.width = 512;
eCanvas.height = 480;

/* Objekten i spelet */
var spel = {
    tid: 60,
    poäng: 0,
    isGameOver: false,
    bild: new Image()
};
var hjälte = {
    x: eCanvas.width / 2,
    y: eCanvas.height / 2,
    a: 5,
    vänster: false,
    höger: false,
    upp: false,
    ned: false,
    bild: new Image(),
    rutIndex: 0,
    rutAntal: 4,
    rutRad: 0
};
var monster = {
    x: 0,
    y: 0,
    bild: new Image()
};

/* Ladda in bilderna */
spel.bild.src = "./bilder/background.png";
hjälte.bild.src = "./bilder/pokemon-blue-sprite.png";
monster.bild.src = "./bilder/monster.png";

/* Canvas inställningar */
ctx.fillStyle = "#FFF";


/* Kör igång spelet */
reset();
gameLoop();

/* ********* */
/* Händelser */

/* Lyssna på tangentnedtryckningar */
window.addEventListener("keydown", function(e) {
    switch (e.key) {
        case "ArrowUp":
            hjälte.upp = true;
            break;
        
        case "ArrowDown":
            hjälte.ned = true;
            break;

        case "ArrowLeft":
            hjälte.vänster = true;
            break;

        case "ArrowRight":
            hjälte.höger = true;
    }
});

window.addEventListener("keyup", function(e) {
    switch (e.key) {
        case "ArrowUp":
            hjälte.upp = false;
            break;
        
        case "ArrowDown":
            hjälte.ned = false;
            break;

        case "ArrowLeft":
            hjälte.vänster = false;
            break;

        case "ArrowRight":
            hjälte.höger = false;
    }
});

window.setInterval(function() {
    spel.tid--;

    if (spel.tid <= 0) {
        spel.isGameOver = true;
        ctx.font = "80px Helvetica";
        ctx.fillText("Game Over!", 32, 200);
    }
}, 1000);

/* ************ */
/* Funktionerna */

/* Återställ spelet */
/* Placera ut hjälten */
function reset() {

/* Spawna monstret slumpmässigt */
    monster.x = 32 + Math.random() * (eCanvas.width - 96);
    monster.y = 32 + Math.random() * (eCanvas.height - 96);
    
}
/* Ritar ut */
function ritaBakgrund() {
    ctx.drawImage(spel.bild, 0, 0);
}
function ritaHjälte() {
    /* Flytta åt det håll vi trycket på piltangeterna */
    if (hjälte.höger) {
        hjälte.x += 3;
        hjälte.rutRad = 2
    } else if (hjälte.vänster) {
        hjälte.x -= 3;
        hjälte.rutRad = 1
    } else if (hjälte.ned) {
        hjälte.y += 3;
        hjälte.rutRad = 0
    } else if (hjälte.upp) {
        hjälte.y -= 3;
        hjälte.rutRad = 3
    } 

    /* Animera med sprite */
    if (hjälte.höger || hjälte.vänster || hjälte.ned || hjälte.upp) {
        var ruta = Math.floor(hjälte.rutIndex / 20);
            ctx.save();
            ctx.translate(hjälte.x, hjälte.y);
            ctx.drawImage(hjälte.bild, ruta * 68, hjälte.rutRad * 72, 68, 72, 0, 0, 50, 50);
            ctx.restore();

            hjälte.rutIndex++;
            if (hjälte.rutIndex == hjälte.rutAntal * 20) {
                hjälte.rutIndex = 0;
            }
    } else {
        ctx.drawImage(hjälte.bild, 0, 0, 68, 72, hjälte.x, hjälte.y, 50, 50);
    }
}
function ritaMonster() {
    ctx.drawImage(monster.bild, monster.x, monster.y);
}
/* Kollar om hjälten träffar monstret */
function kollaKollision() {
    if (hjälte.x <= (monster.x + 32) && monster.x <= (hjälte.x + 32) &&
        hjälte.y <= (monster.y + 32) && monster.y <= (hjälte.y + 32)) {
            reset();
            spel.poäng++;
    }
    /* Skriv ut */
    ctx.font = "24px Helvetica";
    ctx.fillText("Fångade monster: " + spel.poäng, 33, 50);
    ctx.fillText("Tid kvar: " + spel.tid, 33, 70);
}



/* Spelloopen */
function gameLoop() {
    ritaBakgrund();
    ritaHjälte();
    ritaMonster();
    kollaKollision();

    if (!spel.isGameOver) {
        requestAnimationFrame(gameLoop);
    }
}