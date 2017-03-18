// let processId = setInterval(function () {
//     console.log('tik-tak');
// }, 3 * 1000);
//
// setTimeout(function () {
//     clearInterval(processId);
//
//     console.log('clear');
// }, 2 * 1000);



let json;
$.getJSON('/kladr.json', function(data) {
    json = data;
});

console.log(json);