let img = document.getElementById('top_img');
img.onclick = function() {
    setNextText('description');
};

img.onmouseover = function() {
    setNextText('caption');
}

function setNextText(id) {
    let element = document.getElementById(id);
    element.innerText = getNextText();
}

function getNextText() {
    return getText(getRandomInt(0, 5));
}

function getText(index) {
    return ["a", "b", "c", "d", "e"][index];
}

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}