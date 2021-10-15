// Fungsi slideshow pekerja
const slidePekerja = document.querySelectorAll('.img-pekerja');
let currentPekerja = 0;
let totalPekerja = slidePekerja.length;

const timer = setInterval(function() {
    if (currentPekerja === totalPekerja - 1) {
        currentPekerja = 0;
    }
    else {
        currentPekerja++;
    }

    for (let pekerja of slidePekerja) {
        pekerja.classList.remove('active');
        slidePekerja[currentPekerja].classList.add('active');
    }
}, 7000)


// Fungsi slideshow text visi-misi
const misi = document.querySelector('.misi');
const mediaQuery = window.matchMedia('(max-width: 1200px)');

function handleTabletChange(e) {
    if (e.matches) {
        misi.classList.add('fade');
    }
    else {
        misi.classList.remove('fade');
    }
}

mediaQuery.addEventListener('change', handleTabletChange);
handleTabletChange(mediaQuery);


// Button untuk media
const hamburger = document.querySelector('.navMobile');
const navMobile = document.querySelector('.navbarMobile')
const exitNav = document.querySelector('.exitBtn')

const closedNav = document.querySelectorAll('.closedNav');

hamburger.addEventListener('click', function() {
    navMobile.style.display = 'block';
})

exitNav.addEventListener('click', function() {
    navMobile.style.display = 'none';
})

for (let i = 0; i < closedNav.length; i++){
    closedNav[i].addEventListener('click', function() {
        navMobile.style.display = 'none';
    })
}