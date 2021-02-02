$('.carousel').carousel({
    interval: 4000
})

function toggleNavColor() {
    console.log("test");
}

if (window.innerWidth < 1000) {
    const query = document.getElementsByName('nav-collapsers');
    for (element of query) {
        console.log('hello');
        element.style.backgroundColor = '#212121';
        element.style.opacity = '95%';
    }
} else {
    const query = document.getElementsByName('nav-collapsers');
    for (element of query) {
        element.style.backgroundColor = 'transparent';
        element.style.opacity = '100%';
    }
}

