// Transition saat scrolling
// Menggunakan getBoundingRect

window.addEventListener('scroll', function(){
    const container = document.querySelectorAll('.container');
    const mitraText = document.querySelector('.mitra-text');
    const mitraLogo = document.querySelector('.mitra-logo');
    const tentang = container[1];
    const visiMisi = container[2];
    const penghargaan = container[3];
    const mitra = container[4];

    let placeTentang = tentang.getBoundingClientRect().top;
    let placeVisiMisi = visiMisi.getBoundingClientRect().top;
    let placePenghargaan = penghargaan.getBoundingClientRect().top;
    let placeMitra = mitra.getBoundingClientRect().top;

    if (placeTentang < window.innerHeight/2) {
        tentang.classList.add('aos');
    }
    if (placeVisiMisi < window.innerHeight/2) {
        visiMisi.classList.add('aos');
    }
    if (placePenghargaan < window.innerHeight/2) {
        penghargaan.classList.add('aos');
    }
    if (placeMitra < window.innerHeight/2) {
        mitraText.classList.add('text-aos');
        mitraLogo.classList.add('logo-aos');
    }
})