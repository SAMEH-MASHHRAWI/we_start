let links = document.querySelectorAll('header .menu a');
// console.log(links);
links.forEach((link) => {
    link.onclick = (e) => {
        e.preventDefault();
        let section = link.getAttribute('href');
        let space = document.querySelector(section).offsetTop;
        window.scrollTo({
            top: (space - 35),
            behavior: 'smooth'
        })
    }
})

let btn_top = document.querySelector('.top');

window.onscroll = (e) => {
    console.log(window.scrollY);
    if (window.scrollY > 200) {
        btn_top.style.right = '20px';
    } else {
        btn_top.style.right = '-100px';
    }
}

btn_top.onclick = () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    });
}