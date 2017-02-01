

function anonim(arr) {
    return [arr.length.toString(), ...arr].reverse();
}

console.log(anonim([1, 2, 3, "LOL", "D"]));