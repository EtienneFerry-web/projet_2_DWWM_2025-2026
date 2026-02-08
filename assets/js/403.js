const player = document.getElementById("player");
const container = document.getElementById("game-container");
const scoreElement = document.getElementById("score");
let score = 0;
let isGameOver = false;
let speed = 5;

function jump() {
    if (!player.classList.contains("jump")) {
        player.classList.add("jump");
        setTimeout(() => player.classList.remove("jump"), 700);
    }
}

function createObstacle() {
    if (isGameOver) return;
    const topOrBot = Math.random();
    const obstacle = document.createElement("div");
    obstacle.classList.add("obstacle");
    if (topOrBot > 0.5) {
      obstacle.style.bottom = '40px'
      obstacle.innerHTML = "<h4 class='text-danger' >CHEPA h3>";
    } else {
      obstacle.innerHTML = "<h4 class='text-danger' > 403 </h3>";
    }

    container.appendChild(obstacle);

    let obstaclePos = container.clientWidth;

    let timer = setInterval(() => {
        if (isGameOver) {
            clearInterval(timer);
            return;
        }

        obstaclePos -= speed;
        obstacle.style.left = obstaclePos + "px";


        let pRect = player.getBoundingClientRect();
        let oRect = obstacle.getBoundingClientRect();
        if (pRect.right > oRect.left + 5 && pRect.left < oRect.right - 5 && pRect.bottom > oRect.top + 5 && pRect.top < oRect.bottom - 5) {

            if (oRect.top > 100) {

                isGameOver = true;
            } else {

                isGameOver = true;
            }

            if (isGameOver) {
                alert("COUPEZ ! On la refait.");
                location.reload();
            }
        }
    }, 20);
    score += 1;
    scoreElement.textContent = score;

  speed *= 1.1;

    let nextObstacleTime = Math.random() * (2000 - 800) + 800;
    setTimeout(createObstacle, nextObstacleTime);
}

document.addEventListener("keydown", (e) => {
    if (e.code === "ArrowDown") {
        e.preventDefault();
        player.style.height = '20px'
    }

    if (e.code === "ArrowUp" || e.code === "Space") {
        e.preventDefault();
        jump();
    }
});

document.addEventListener("keyup", (e) => {
    if (e.code === "ArrowDown") {
        player.style.height = '50px'
    }
});
