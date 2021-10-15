// Carousel
const carousel = document.querySelectorAll('.produk');
const carouselPrev = document.querySelector('#prev');
const carouselNext = document.querySelector('#next');

let currentSlide = 0;
let totalSlides = carousel.length;

// Fungsi untuk mengubah tampilan gambar
function updateSlides(){
    for (let slide of carousel){
        slide.classList.remove('active');
        carousel[currentSlide].classList.add('active');
    }
}

function nextSlide(){
    if (currentSlide === totalSlides - 1){
        currentSlide = 0;
    }
    else {
        currentSlide++;
    }

    updateSlides();
}

function prevSlide(){
    if (currentSlide === 0){
        currentSlide = totalSlides - 1;
    }
    else {
        currentSlide--;
    }

    updateSlides();
}

// Tombol saat ditekan
carouselPrev.addEventListener('click', function(){
    prevSlide();
})

carouselNext.addEventListener('click', function(){
    nextSlide();
})

// Menggunakan waktu untuk memindahkan slide otomatis
const carouselTimer = setInterval(function(){
    nextSlide();
}, 7000);