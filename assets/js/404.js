class DvdAnimation {
    constructor() {
        // Sélection des éléments
        this.box = document.getElementById('dvd-logo');
        this.zone = document.getElementById('zone');

        // Dimensions Zone et Logo Dvd
        this.zoneWidth = this.zone.clientWidth;
        this.zoneHeight = this.zone.clientHeight;
        this.boxWidth = this.box.clientWidth;
        this.boxHeight = this.box.clientHeight;

        // Position de départ vitesse
        this.posX = Math.random() * (this.zoneWidth - this.boxWidth);
        this.posY = Math.random() * (this.zoneHeight - this.boxHeight);
        this.movX = 500;
        this.movY = 500;

        //Attribut pour les colision et lastime pour gérer le parametre de requestAnimationFrame
        this.lastTime = 0;
        this.hit = false;

        //Les couleur aléatoire
        this.colors = ['#2E5BFF', '#D81B60', '#00796B', '#6A1B9A', '#E65100', '#1A1A1B', '#FF4500', '#0000FF', '#228B22', '#800080'];
        this.lastColorIndex = 0;

        //Appelle de la méthode pour lancer l'animation
        this.init();
    }

    init() {
        // État initial
        this.box.style.color = this.colors[0];

        // Événements Changement de la zone et click sur le logoDvd
        this.box.addEventListener('click', () => this.handleClick());
        window.addEventListener('resize', () => this.handleResize());

        // Lancement de la boucle
        requestAnimationFrame((t) => this.update(t));
    }

    handleResize() {
        this.zoneWidth = this.zone.clientWidth;
        this.zoneHeight = this.zone.clientHeight;
    }

    handleClick() {
        if (this.hit) return;
        this.movX *= -2;
        this.movY *= -2;
    }

  update(timestamp) {
        //Survielle le temps de frame pour un fluidité similaire surtout les l'écrans
        if (!this.lastTime) this.lastTime = timestamp;
        const deltaTime = (timestamp - this.lastTime) / 1000;
        this.lastTime = timestamp;


        this.posX += (this.movX * deltaTime);
        this.posY += (this.movY * deltaTime);
        this.hit = false;

        // Ralentissement Si vitesse > 500
        if (Math.abs(this.movX) > 500 || Math.abs(this.movY) > 500) {
            console.log('test');
            this.movX *= 0.999;
            this.movY *= 0.999;
        }

        // Collisions horizontales
        if (this.posX + this.boxWidth >= this.zoneWidth) {
            this.posX = this.zoneWidth - this.boxWidth;
            this.movX *= -1;
            this.hit = true;
        } else if (this.posX <= 0) {
            this.posX = 0;
            this.movX *= -1;
            this.hit = true;
        }

        // Collisions verticales
        if (this.posY + this.boxHeight >= this.zoneHeight) {
            this.posY = this.zoneHeight - this.boxHeight;
            this.movY *= -1;
            this.hit = true;
        } else if (this.posY <= 0) {
            this.posY = 0;
            this.movY *= -1;
            this.hit = true;
        }

        // Changement de couleur si impact
        if (this.hit) {
            let newColorIndex;
            do {
                newColorIndex = Math.floor(Math.random() * this.colors.length);
            } while (newColorIndex === this.lastColorIndex);

            this.lastColorIndex = newColorIndex;
            this.box.style.color = this.colors[newColorIndex];
        }

        // Déplacement
        this.box.style.transform = `translate(${this.posX}px, ${this.posY}px)`;

        // Prochain frame
        requestAnimationFrame((t) => this.update(t));
    }
}

// Initialisation de l'objet
const animation = new DvdAnimation();
