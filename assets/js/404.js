const box = document.getElementById('dvd-logo');
const zone = document.getElementById('zone');

let zoneWidth = zone.clientWidth;
let zoneHeight = zone.clientHeight;

const boxWidth = box.clientWidth;
const boxHeight = box.clientHeight;

let posX = Math.random() * (zoneWidth - boxWidth);
let posY = Math.random() * (zoneHeight - boxHeight);
let movX = 2.5;
let movY = 2.5;


const colors = ['#2E5BFF', '#D81B60', '#00796B', '#6A1B9A', '#E65100', '#1A1A1B', '#FF4500', '#0000FF', '#228B22', '#800080'];
let lastColorIndex = 0;

function update() {
    posX += movX;
    posY += movY;
    let hit = false;

    if (movX > 2.5 || movX < -2.5 && movY > 2.5 || movY < -2.5) {
      movX *= 0.999;
      movY *= 0.999;
    }

    if (posX + boxWidth >= zoneWidth || posX <= 0) {
        movX *= -1;
        hit = true;
    }
    if (posY + boxHeight >= zoneHeight || posY <= 0) {
        movY *= -1;
        hit = true;
    }

    if (hit) {
      let newColorIndex;

        do {
            newColorIndex = Math.floor(Math.random() * colors.length);
        } while (newColorIndex === lastColorIndex);

        lastColorIndex = newColorIndex;
        box.style.color = colors[newColorIndex];

    }
  console.log(hit);
    box.style.transform = `translate(${posX}px, ${posY}px)`;
    requestAnimationFrame(update);
}


box.style.color = colors[0];
update();

box.addEventListener('click', () => {
  movX *= -2;
  movY *= -2;

});




window.addEventListener('resize', () => {
    zoneWidth = zone.clientWidth;
    zoneHeight = zone.clientHeight;
});
