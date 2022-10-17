// let age = 22;
// if (age >= 20) {
//     console.log('welcome if');
// } else {
//     console.log('Erorr');
// }



// age = 20;
// let s = (age >= 20) ? 'welcom Bro' : 'go away';
// console.log(s);

// setTimeout(function(){
//     console.log(Timeout);
// }, 1000);


// setInterval(function () {
//     console.log(Interval);
// }, 1000);

let x = [5, 7, 8, 10, 255]


// let newX=  x.map(function (el) {
//    return el>5;
// });
// console.log(newX);



// let newS= x.filter(function (el) {
//     return el > 5;
// });
// console.log(newS);


// x.forEach(function (el) {
// console.log(el);
// });


// let person = {
//     name: 'sameh',
//     age:28
// }
// console.log( person);
let btn = document.getElementById('btn')
let wrapper = document.getElementById('wrapper')
let bar = document.getElementById('bar');
let num = document.getElementById('num');
let progress = document.getElementById('progress');
btn.addEventListener('click', function () {
    let i = num.innerHTML;
    let f = 0;
    let size = 100 / i;
    let d = setInterval(function () {
        num.innerHTML = i--;
        if (i < 0) {
            clearInterval(d);
        } 
        f += size;
        progress.style.width = f + '%';
    }, 1000)
})