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
        console.log('1');
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

let menu = new Menu(document.querySelectorAll('nav > ul > li'));


function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}