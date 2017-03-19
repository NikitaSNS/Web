'use strict';

class MenuItem {

    constructor(domElement) {
        this.dom = domElement;
    }

    initialize(handler) {
        this.handler = handler;
        this.dom.addEventListener('click', this.handler);
    }

    terminate() {
        this.dom.removeEventListener('click', this.handler);
    }
}

class HandlerFactory {

    constructor() {

    }

    static getHandler(win = false) {
        return win ? HandlerFactory.winHandler : HandlerFactory.loseHandler;
    }

    static winHandler() {
        window.location.href = './templates/win.html'
    }

    static loseHandler() {
        window.location.href = './templates/lose.html'
    }
}

class Menu {

    constructor(domElements) {
        this.elements = [];

        this.elements = Array.prototype.slice.call(domElements).map(function (e) {
            return new MenuItem(e);
        });
    }

    initialize() {
        let indexActiveElement = getRandomInt(0, this.elements.length);

        this.indexActiveElement = indexActiveElement;

        this.elements.forEach(function (e, i) {
            e.initialize(HandlerFactory.getHandler(indexActiveElement === i));
        });

        console.log('Active : ' + this.elements[this.indexActiveElement].dom.innerText);
    }

    update() {
        this.elements[this.indexActiveElement].terminate();

        this.initialize();
    }
}

class Game {

    constructor(menu) {
        this.menu = new Menu(menu);
    }

    static run(game) {

        game.menu.initialize();

        game.timerId = setInterval(function () {
            game.update();
        }, 3 * 1000);
    }

    update() {
        this.menu.update();
    }

    isRedirectedFromLoser(url) {
        console.log(url);
        return url.indexOf('lose.html') !== -1;
    }
}


window.onload = function () {
    let game = new Game(document.querySelectorAll('nav > ul > li'));

    if (game.isRedirectedFromLoser(document.referrer)) {
        alert('Читер!');
    } else {
        Game.run(game);
    }
};


function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}