let menuLis = $('.social-holder > li');

//menuLis[4].after(menuLis[0]);

console.log($(menuLis[5]).position().left - $(menuLis[4]).position().left);

$(menuLis[4]).animate(
    getPositionToMove($(menuLis[3]).position().left, $(menuLis[4]).position().left),
    2000,
    function () {

});

function getPositionToMove(to, from) {
    return {
        top: '-30px',
        left: to - from,
    };
}