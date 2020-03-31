/* Element vi jobbar med */
const ePoäng = document.querySelector("#poäng");

const eCanvas = document.querySelector("canvas");

/* Ställ in bredd och höjd */
eCanvas.width = 800;
eCanvas.height = 600;

/* Starta canvas startyta */
var ctx = eCanvas.getContext("2d");

/* *********************** */
/* Globala variabler */

/* Objekt */
var piga = {
    rad: 0,
    kol: 1,
    rot: 0,
    bild: new Image()
}

var monster1 = {
    x: Math.ceil(Math.random() * 750),
    y: -Math.ceil(Math.random() * 200),
    bild: new Image()
}
var monster2 = {
    x: Math.ceil(Math.random() * 750),
    y: -Math.ceil(Math.random() * 250),
    bild: new Image()
}
var monster3 = {
    x: Math.ceil(Math.random() * 750),
    y: -Math.ceil(Math.random() * 350),
    bild: new Image()
}
var mynt1 = {
    x: Math.ceil(Math.random() * 750),
    y: -Math.ceil(Math.random() * 300),
    bild: new Image()
}
var mynt2 = {
    x: Math.ceil(Math.random() * 750),
    y: -Math.ceil(Math.random() * 500),
    bild: new Image()
}
var mynt3 = {
    x: Math.ceil(Math.random() * 750),
    y: -Math.ceil(Math.random() * 750),
    bild: new Image()
}
/* Spelets variabler */
var isGameOver = false;
var poäng = 0;

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

/* ********************************* */
/* Inställningar före spelet startar */
/* Ladda in pigans och monsters bild */
piga.bild.src = "./nyckelpiga.png";
monster1.bild.src = "./monster.png";
monster2.bild.src = "./monster.png";
monster3.bild.src = "./monster.png";
mynt1.bild.src = "./coin-sprite.png";
mynt2.bild.src = "./coin-sprite.png";
mynt3.bild.src = "./coin-sprite.png";

/* Lagra alla monster i en array */
var monsters = [];
monsters.push(monster1);
monsters.push(monster2);
monsters.push(monster3);

/* Lagra alla myny i en array */
var mynten = [];
mynten.push(mynt1);
mynten.push(mynt2);
mynten.push(mynt3);
/* Ladda in tilesheet */
var tileSheet = new Image();
tileSheet.src = "./tileset-swamp.png";

/* Välj textinställningar */
ctx.font = "96px Sans-serif";
ctx.textAlign = "center";
ctx.fillStyle = "#FFF";

/* När man krockar med monster */
function gameOver() {
    ctx.fillStyle = "#999";
    ctx.fillRect(0, 0, 800, 600);
    ctx.fillStyle = "red";
    ctx.fillText("Game Over!", 400, 300);
}

/* Lyssna på pil-tangenterna */
window.addEventListener("keydown", function (e) {
    switch (e.key) {
        case "ArrowRight":
            if (karta[piga.rad][piga.kol + 1] == 0) {
                piga.kol++; 
            }
            
            piga.rot = 90;
            break;
        case "ArrowLeft":
            if (karta[piga.rad][piga.kol - 1] == 0) {
                piga.kol--;
            }
            piga.rot = 270;
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
            
            piga.rot = 180;
            break;
    }
});

/* Spel-loopen */
function gameLoop() {
    /* Rensa canvas */
    ctx.clearRect(0, 0, eCanvas.width, eCanvas.height);

    ritaKarta();
    ritaPiga();

    mynten.forEach(ritaMynten);
    mynten.forEach(TaUppMynt);

    monsters.forEach(ritaMonsters);
    monsters.forEach(krockMedPiga);


    
    if (!isGameOver) {
        requestAnimationFrame(gameLoop);
    } else {
        gameOver();
    }
    
}

/* Starta spelet */
gameLoop();

/* ******************* */
/* Funktionerna  */

/* Rita ut nyckelpigan */
function ritaPiga() {
    ctx.save();
    ctx.translate(piga.kol * 50 + 25, piga.rad * 50 + 25);
    ctx.rotate(piga.rot * (Math.PI / 180));
    ctx.drawImage(piga.bild, -25, -25, 50, 50);
    ctx.restore();
}
/* y = 416 x = 32 */
/* Rita ut en monsterfigur */
function ritaMonsters(figur) {
    ctx.drawImage(figur.bild, figur.x, figur.y);
    
    figur.y++;
    if (figur.y > 600) {
        figur.y = -10;
        figur.x = Math.ceil(Math.random() * 750);
    }
}
/* Rita ut alla mynt */
function ritaMynten(mynt) {
    ctx.drawImage(mynt.bild, 0, 0, 50, 50, mynt.x, mynt.y, 40, 40);
    mynt.y++;

    if (mynt.y > 600) {
        mynt.x = Math.ceil(Math.random() * 750);
        mynt.y = -Math.ceil(Math.random() * 750);
    }
    isGameover = false;
}
/* Kolla om monster figuren krockar med pigan*/
function krockMedPiga(figur) {
    var px = piga.kol * 50;
    var py = piga.rad * 50 + 25;

    /* Om monster krockar med piggan */
    if (py < figur.y && figur.y < py + 50) {
        if (px < figur.x && figur.x < px + 50) {
            isGameOver = true;
        }
    }
}

/* Kolla om man tar upp mynten */
function TaUppMynt(mynt) {
    var px = piga.kol * 50;
    var py = piga.rad * 50 + 25;

    if (py < mynt.y && mynt.y < py + 50) {
        if (px < mynt.x && mynt.x < px + 50) {
            poäng++;
            ePoäng.textContent = poäng;

            if (poäng) {
                mynt.x = Math.ceil(Math.random() * 750);
                mynt.y = -Math.ceil(Math.random() * 500);
            }
            isGameOver = false;
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