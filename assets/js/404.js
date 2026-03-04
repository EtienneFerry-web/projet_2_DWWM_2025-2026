/**
 * @class DvdAnimation
 * @brief Handles a bouncing DVD-style animation within a container.
 * * This class manages the movement, boundary collisions, color cycling, 
 * and interactive speed scaling of an element.
 */
class DvdAnimation {
    /**
     * @constructor
     * @brief Initializes the animation state and starts the loop.
     */
    constructor() {
        this.box = document.getElementById('dvd-logo');
        this.zone = document.getElementById('zone');

        this.zoneWidth = this.zone.clientWidth;
        this.zoneHeight = this.zone.clientHeight;
        this.boxWidth = this.box.clientWidth;
        this.boxHeight = this.box.clientHeight;

        this.posX = Math.random() * (this.zoneWidth - this.boxWidth);
        this.posY = Math.random() * (this.zoneHeight - this.boxHeight);
        this.movX = 500;
        this.movY = 500;

        this.lastTime = 0;
        this.hit = false;

        this.colors = ['#2E5BFF', '#D81B60', '#00796B', '#6A1B9A', '#E65100', '#1A1A1B', '#FF4500', '#0000FF', '#228B22', '#800080'];
        this.lastColorIndex = 0;

        this.init();
    }

    /**
     * @fn init
     * @brief Sets up initial styles and attaches event listeners.
     * @return {void}
     */
    init() {
        this.box.style.color = this.colors[0];

        this.box.addEventListener('click', () => this.handleClick());
        window.addEventListener('resize', () => this.handleResize());

        requestAnimationFrame((t) => this.update(t));
    }

    /**
     * @fn handleResize
     * @brief Refreshes the boundaries when the window is resized.
     * @return {void}
     */
    handleResize() {
        this.zoneWidth = this.zone.clientWidth;
        this.zoneHeight = this.zone.clientHeight;
    }

    /**
     * @fn handleClick
     * @brief Increases movement speed and reverses direction upon user click.
     * @return {void}
     */
    handleClick() {
        if (this.hit) return;
        this.movX *= -2;
        this.movY *= -2;
    }

    /**
     * @fn update
     * @brief Core animation loop that calculates physics and renders the position.
     * @param {number} timestamp - The current time in milliseconds provided by requestAnimationFrame.
     * @return {void}
     */
    update(timestamp) {
        if (!this.lastTime) this.lastTime = timestamp;
        const deltaTime = (timestamp - this.lastTime) / 1000;
        this.lastTime = timestamp;

        this.posX += (this.movX * deltaTime);
        this.posY += (this.movY * deltaTime);
        this.hit = false;

        if (Math.abs(this.movX) > 500 || Math.abs(this.movY) > 500) {
            this.movX *= 0.999;
            this.movY *= 0.999;
        }

        if (this.posX + this.boxWidth >= this.zoneWidth) {
            this.posX = this.zoneWidth - this.boxWidth;
            this.movX *= -1;
            this.hit = true;
        } else if (this.posX <= 0) {
            this.posX = 0;
            this.movX *= -1;
            this.hit = true;
        }

        if (this.posY + this.boxHeight >= this.zoneHeight) {
            this.posY = this.zoneHeight - this.boxHeight;
            this.movY *= -1;
            this.hit = true;
        } else if (this.posY <= 0) {
            this.posY = 0;
            this.movY *= -1;
            this.hit = true;
        }

        if (this.hit) {
            let newColorIndex;
            do {
                newColorIndex = Math.floor(Math.random() * this.colors.length);
            } while (newColorIndex === this.lastColorIndex);

            this.lastColorIndex = newColorIndex;
            this.box.style.color = this.colors[newColorIndex];
        }

        this.box.style.transform = `translate(${this.posX}px, ${this.posY}px)`;

        requestAnimationFrame((t) => this.update(t));
    }
}

/** * @brief Entry point: Instance of the animation class. 
 */
const animation = new DvdAnimation();