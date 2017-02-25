document.querySelector('.print').onclick = function() {
    window.print();
}

document.querySelectorAll('.icon').forEach(function(e) {
    if (e.className.indexOf('print') !== -1) {
        return;
    }
    e.onclick = function() {
        window.open(linkResolve(e.className.substring(5)), "_blank");
    };
});


function linkResolve(className) {

    let comparison = {
        'no_name': 'no_name',
        'li': 'linkedin.com',
        'mail': 'mail.ru',
        'space': 'myspace.com',
    }

    let uri = 'http://www.';

    if (comparison[className] !== undefined) {
        return uri + comparison[className];
    }

    return uri + className + '.com';
}