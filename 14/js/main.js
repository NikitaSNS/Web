class Logo {
    constructor(font, link, words) {
        this.font = font;
        this.link = link;
        this.words = words;
    }
}

class Word {
    constructor(symbol, color) {
        this.symbol = symbol;
        this.color = color;
    }
}

let canvas = document.getElementById('c');
let ctx = canvas.getContext('2d');

let logo;

if (getRandomInt(0, 2) === 0) {
    logo = new Logo('Product Sans', 'https://www.google.ru/', [
        new Word('G', '#4285f4'),
        new Word('o', '#ea4335'),
        new Word('o', '#fbbc05'),
        new Word('g', '#4285f4'),
        new Word('l', '#34a853'),
        new Word('e', '#ea4335'),
    ]);
} else {
    logo = new Logo('Yandex', 'https://yandex.ru/', [
        new Word('Y', '#ff0000'),
        new Word('a', '#000000'),
        new Word('n', '#000000'),
        new Word('d', '#000000'),
        new Word('e', '#000000'),
        new Word('x', '#000000'),
    ]);
}


canvas.width = canvas.clientWidth;
canvas.height = canvas.clientHeight;

draw(canvas, ctx, logo, 0);

function draw(canvas, ctx, logo, index) {

    let symbols = logo.words;

    let image = new Image;
    image.src = '';

    ctx.font = '130px "' + logo.font + '"';
    ctx.textAlign = "center";

    let increment = canvas.width / (index + 2);
    let position = 0;

    image.onerror = function () {
        ctx.clearRect(0, 0, canvas.width, canvas.height);
        for (let i = 0; i <= index; i++) {
            ctx.fillStyle = symbols[i].color;
            ctx.fillText(symbols[i].symbol, position += increment, canvas.height / 1.5);
        }
    };

    if (index === symbols.length - 1) {
        canvas.addEventListener('click', function() {
            window.open(logo.link, '_blank').focus();
        }, false);
        canvas.className = 'pointer';
        return;
    }

    setTimeout(function () {
        draw(canvas, ctx, logo, ++index);
    }, 10 * 1000 / symbols.length);
}

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}
