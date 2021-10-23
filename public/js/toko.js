// Mengambil waktu sekarang
const date = new Date();

let tanggal = date.getDate().toString().padStart(2, '0');
let bulan = (date.getMonth() + 1).toString().padStart(2, '0');
let tahun = date.getFullYear();

let day = date.getDay();
let stringDay;

switch(day) {
    case 0:
        stringDay = 'Minggu';
        break;
    case 1:
        stringDay = 'Senin';
        break;
    case 2:
        stringDay = 'Selasa';
        break;
    case 3:
        stringDay = 'Rabu';
        break;
    case 4:
        stringDay = 'Kamis';
        break;
    case 5:
        stringDay = 'Jumat';
        break;
    case 6:
        stringDay = 'Sabtu';
        break;
}

const domHari = document.querySelector('.hari');
const domTanggal = document.querySelector('.isi-tanggal');

domHari.innerText = stringDay;
domTanggal.innerText = tanggal + '/' + bulan + '/' + tahun;
