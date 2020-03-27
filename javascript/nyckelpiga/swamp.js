/* Element vi jobbar med */
const eCanvas = document.querySelector("canvas");

/* Ställ in bredd och höjd */
eCanvas.width = 800;
eCanvas.height = 600;

/* Starta canvas startyta */
var ctx = eCanvas.getContext("2d");
/* Globala variabler */
var gameOver = false;
var piga = {
    rad: 0,
    kol: 0,
    rot: 0,
    bild: new Image()
}

var monster = {
    x: 0,
    y: 0,
    bild: new Image()
}
var monster2 = {
    x: 0,
    y: 0,
    bild: new Image()
}
var monster3 = {
    x: 0,
    y: 0,
    bild: new Image()
}
var karta = [
    [14, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0],
    [14, 0, 1, 2, 2, 2, 2, 2, 3, 0, 0, 1, 2, 2, 3, 0],
    [14, 0, 11, 0, 0, 0, 0, 0, 14, 2, 0, 11, 0, 0, 0, 0],
    [14, 0, 21, 22, 22, 23, 0, 0, 14, 0, 0, 11, 0, 1, 2, 2],
    [14, 0, 0, 0, 0, 0, 0, 0, 14, 0, 2, 11, 0, 0, 0, 0],
    [14, 0, 0, 0, 0, 1, 0, 0, 14, 0, 0, 11, 0, 2, 0, 0],
    [24, 2, 2, 2, 2, 26, 0, 0, 14, 0, 0, 11, 2,12, 2, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 14, 2, 0, 11, 0, 0, 0, 0],
    [0, 1, 2, 2, 2, 2, 0, 0, 14, 0, 0, 21, 23, 0, 1, 0],
    [0, 21, 0, 0, 0, 22, 22, 22, 23, 0, 0, 0, 0, 0, 11, 0],
    [0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 0, 1, 2, 2, 26, 0],
    [2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 2, 26, 0, 0, 0, 0]
];

/* Nyckelpigans startläga */
piga.rad = 0;
piga.kol = 1;

/* Monsterns startläge */
monster.x = Math.ceil(Math.random() * 750);
monster.y = 0;
monster2.x = Math.ceil(Math.random() * 750);
monster2.y = 0;
monster3.x = Math.ceil(Math.random() * 750);
monster3.y = 0;

/* Ladda in pigans och månsters bild */
piga.bild.src = "./nyckelpiga.png";
monster.bild.src = "./monster.png";
monster2.bild.src = "./monster.png";
monster3.bild.src = "./monster.png";

/* Ladda in tilesheet */
var tileSheet = new Image();
tileSheet.src = "./tileset-swamp.png";

/* Välj textinställningar */
ctx.font = "96px Sans-serif";
ctx.textAlign = "center";
ctx.fillStyle = "#FFF";

/* Rita ut nyckelpigan */
function ritaPiga() {
    ctx.save();
    ctx.translate(piga.kol * 50 + 25, piga.rad * 50 + 25);
    ctx.rotate(piga.rot);
    ctx.drawImage(piga.bild, -25, -25, 50, 50);
    ctx.restore();
}
/* y = 416 x = 32 */
/* Rita ut et monster */
function ritaMonster() {
    ctx.drawImage(monster.bild, monster.x, monster.y);
    
    monster.y++;
    if (monster.y > 600) {
        monster.y = -10;
        monster.x = Math.ceil(Math.random() * 750);
    }
}
function ritaMonster2() {
    ctx.drawImage(monster2.bild, monster2.x, monster2.y);
    
    monster2.y++;
    if (monster2.y > 600) {
        monster2.y = -10;
        monster2.x = Math.ceil(Math.random() * 750);
    }
}
function ritaMonster3() {
    ctx.drawImage(monster3.bild, monster3.x, monster3.y);
    
    monster3.y++;
    if (monster3.y > 600) {
        monster3.y = -10;
        monster3.x = Math.ceil(Math.random() * 750);
    }
}

/* Kolla om pigan träffas av monstret */
function krock() {
    /* Om monster krockar med piggan */
    if ((piga.rad * 50) < monster.y && monster.y < (piga.rad * 50 + 50)) {
        if ((piga.kol * 50) < monster.x && monster.x < (piga.kol * 50 + 50)) {
            ctx.fillStyle = "#999";
            ctx.fillRect(0, 0, 800, 600);
            ctx.fillStyle = "red";
            ctx.fillText("Game Over!", 400, 300);
            gameOver = true;
            console.log("Krock");
            
        }
    }
}
function krock2() {
    /* Om monster krockar med piggan */
    if ((piga.rad * 50) < monster2.y && monster2.y < (piga.rad * 50 + 50)) {
        if ((piga.kol * 50) < monster2.x && monster2.x < (piga.kol * 50 + 50)) {
            ctx.fillStyle = "#999";
            ctx.fillRect(0, 0, 800, 600);
            ctx.fillStyle = "red";
            ctx.fillText("Game Over!", 400, 300);
            gameOver = true;
            console.log("Krock2");
        }
    }
}
function krock3() {
    /* Om monster krockar med piggan */
    if ((piga.rad * 50) < monster3.y && monster3.y < (piga.rad * 50 + 50)) {
        if ((piga.kol * 50) < monster3.x && monster3.x < (piga.kol * 50 + 50)) {
            ctx.fillStyle = "#999";
            ctx.fillRect(0, 0, 800, 600);
            ctx.fillStyle = "red";
            ctx.fillText("Game Over!", 400, 300);
            gameOver = true;
            console.log("Krock3");
        }
    }
}

/* Rita ut kartan */
function ritaKarta() {
    /* Gå igenom varje rad */
    for (var rad = 0; rad < karta.length; rad++) {
        /* Gå igenom varje kolumn */
        for (var kol = 0; kol < karta[rad].length; kol++) {
            if (karta[rad][kol] != 0 ) {
                var rest = karta[rad][kol] % 10;
                var rutaPos;
                if (rest == 0) {
                    rutaPos = 10 * 32 - 32;
                } else {
                    rutaPos = rest * 32 - 32;
                }

                var rutaPosRad = Math.ceil(karta[rad][kol] / 10) * 32 - 32;
                
                ctx.drawImage(tileSheet, rutaPos, rutaPosRad, 32, 32, kol * 50, rad * 50, 50, 50);
            }
        }
    }
}

/* Lyssna på pil-tangenterna */
window.addEventListener("keydown", function (e) {
    switch (e.key) {
        case "ArrowRight":
            if (karta[piga.rad][piga.kol + 1] == 0) {
                piga.kol++; 
            }
            
            piga.rot = 90 * (Math.PI / 180);
            break;
        case "ArrowLeft":
            if (karta[piga.rad][piga.kol - 1] == 0) {
                piga.kol--;
            }
            piga.rot = -90 * (Math.PI / 180);
            break;
        case "ArrowUp":
            if (karta[piga.rad - 1][piga.kol] == 0) {
                piga.rad--; 
            }
            piga.rot = 0;
            break;
        case "ArrowDown":
            if (karta[piga.rad + 1][piga.kol] == 0) {
                piga.rad++; 
            }
            
            piga.rot = Math.PI;
            break;
    }
});

/* Spel-loopen */
function gameLoop() {
    /* Rensa canvas */
    ctx.clearRect(0, 0, eCanvas.width, eCanvas.height);

    ritaKarta();
    ritaPiga();
    ritaMonster();
    ritaMonster2();
    ritaMonster3();
    krock();
    krock2();
    krock3();

    if (!gameOver) {
        requestAnimationFrame(gameLoop);
    }
    
}

/* Starta spelet */
gameLoop();