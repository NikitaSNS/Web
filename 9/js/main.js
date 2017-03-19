'use strict';

class MenuItem {

    constructor(domElement) {
        this.dom = domElement;
    }

    initialize() {
        this.dom.addEventListener('click', MenuItem.clickHandler);
    }

    terminate() {
        this.dom.removeEventListener('click', MenuItem.clickHandler);
    }

    static clickHandler() {
        window.location.href = './templates/win.html';
        console.log('click');
    }
}

class Menu {

    constructor(domElements) {
        this.elements = [];

        this.elements = Array.prototype.slice.call(domElements).map(function (e) {
            return new MenuItem(e);
        });

        this.initialize();
    }

    initialize() {
        this.activeElement = this.getRandomChild();
        this.activeElement.initialize();
        console.log(this.activeElement.dom.innerText);
    }

    update() {
        this.activeElement.terminate();

        this.initialize();
    }

    getRandomChild() {
        return this.elements[getRandomInt(0, this.elements.length)]
    }
}

class Game {

    constructor(menu) {
        this.menu = new Menu(menu);
    }

    static run(game) {
        game.checkGame();

        this.timerId = setInterval(function () {
            game.update();
        }, 3 * 1000);
    }

    update() {
        this.menu.update();
    }

    stop() {
        clearInterval(this.timerId);
    }

    checkGame() {
        console.log(document.referrer);
    }
}

let game = new Game(document.querySelectorAll('nav > ul > li'));

Game.run(game);


function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}