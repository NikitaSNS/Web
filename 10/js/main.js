let element = document.querySelector('figure > img');

let browser = getBrowser();

let browsersImgs = {
    'Chrome' : 'chrome.png',
    'Opera' : 'opera.jpg',
    'Firefox': 'firefox.jpg'
};

let imgLink = '';

console.log(browser);

console.log(browsersImgs);

for(let key in browsersImgs) {
    if (browser.browser === key) {
        imgLink = browsersImgs[key];

        setInterval(function () {
            let menus = document.querySelectorAll('.social-holder li a');
            let randomElement = menus[getRandomInt(0, menus.length - 1)];
            console.log(randomElement);
            randomElement.click();
        }, browser.version * 1000);

        break;
    }
}
console.log(imgLink);

if (imgLink !== '') {
    element.outerHTML = '<img src="img/' + imgLink + '" alt="Moscow Auto Glass">';
}

function getBrowser() {
    let ua = navigator.userAgent, tem,
        M = ua.match(/(opera|chrome|safari|firefox|msie|trident(?=\/))\/?\s*(\d+)/i) || [];
    if (/trident/i.test(M[1])) {
        tem = /\brv[ :]+(\d+)/g.exec(ua) || [];
        return 'IE ' + (tem[1] || '');
    }
    if (M[1] === 'Chrome') {
        tem = ua.match(/\b(OPR|Edge)\/(\d+)/);
        if (tem != null) return tem.slice(1).join(' ').replace('OPR', 'Opera');
    }
    M = M[2] ? [M[1], M[2]] : [navigator.appName, navigator.appVersion, '-?'];
    if ((tem = ua.match(/version\/(\d+)/i)) != null) M.splice(1, 1, tem[1]);

    return {'browser': M[0], 'version': M[1]};
}

function getRandomInt(min, max) {
    return Math.floor(Math.random() * (max - min)) + min;
}