let img = document.getElementById('top_img');
img.onclick = function () {
    setNextText('description');
};

img.onmouseover = function () {
    setNextText('caption');
};

function setNextText(id) {
    let element = document.getElementById(id);
    element.innerText = getNextText();
}

function getNextText() {
    return getText(getRandomInt(0, 5));
}

function getText(index) {
    return [
        "Learn Java, they said it'll be fun, they said",
        "Lorem",
        "Del",
        "PHP TRUE",
        "How to learn C++ in 21 days"
    ][index];
}

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}