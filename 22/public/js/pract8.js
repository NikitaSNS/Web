document.querySelectorAll('nav > ul > li').forEach(function(e) {

    let eventClass = 'active';

    e.addEventListener('mouseover', function() {
        this.className = eventClass;

        let childs = this.parentNode.children;

        for (let i = 0; i < childs.length; i++) {
            childs[i].firstChild.style.color = childs[i].className === eventClass ? 'rgba(255, 216, 0, 1)' : 'rgba(255, 216, 0, 0.5)'
        }
    });

    e.addEventListener('mouseleave', function() {
        this.className = '';

        let childs = this.parentNode.children;

        for (let i = 0; i < childs.length; i++) {
            if (childs.className === eventClass) {
                return;
            }
        }

        for (let i = 0; i < childs.length; i++) {
            childs[i].firstChild.style.color = '#ffc000';
        }
    });

});