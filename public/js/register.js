AOS.init();

const form = document.querySelector("form"),
        nextBtn = form.querySelector(".nextBtn"),
        backBtn = form.querySelector(".backBtn"),
        allInput = form.querySelectorAll(".first input");


nextBtn.addEventListener("click", ()=> {
    allInput.forEach(input => {
        if(input.value != ""){
            form.classList.add('secActive');
        }else{
            form.classList.remove('secActive');
        }
    })
})

backBtn.addEventListener("click", () => form.classList.remove('secActive'));

//json
function fillProvinces() {
    const provinsiSelect = document.getElementById('provinsi');


    fetch('/json/data.json')  
        .then(response => response.json())
        .then(data => {
            data.forEach(provinsiData => {
                const option = document.createElement('option');
                option.value = provinsiData.provinsi;
                option.text = provinsiData.provinsi;
                provinsiSelect.add(option);
            });
        })
        .catch(error => console.error('Error:', error));
}

function fillRegencies(provinsiName) {
    const kotaSelect = document.getElementById('kota');


    fetch('/json/data.json')  
        .then(response => response.json())
        .then(data => {
            const selectedProvinsi = data.find(provinsiData => provinsiData.provinsi === provinsiName);

            if (selectedProvinsi) {
                kotaSelect.innerHTML = '<option disabled selected>Pilih Kabupaten/Kota</option>';
                selectedProvinsi.kota.forEach(kota => {
                    const option = document.createElement('option');
                    option.value = kota;
                    option.text = kota;
                    kotaSelect.add(option);
                });
            } else {
                console.error('Provinsi tidak ditemukan:', provinsiName);
            }
        })
        .catch(error => console.error('Error:', error));
}

window.onload = function() {
    fillProvinces();

    document.getElementById('provinsi').addEventListener('change', function() {
        const selectedProvinsiName = this.value;
        fillRegencies(selectedProvinsiName);
    });
};

// Background
const imageUrls = [
    'https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/2-11.jpg',
    'https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/Graduation.jpg',
    'https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/IMG_2051.jpg',
    'https://newuinsu.uinsu.ac.id/wp-content/uploads/2024/02/uin.png'
];

let currentIndex = 0;

function changeBackground() {
    document.body.style.backgroundImage = `url('${imageUrls[currentIndex]}')`;
    currentIndex = (currentIndex + 1) % imageUrls.length;
}

// Menunggu gambar pertama dimuat sebelum mengatur interval
const firstImage = new Image();
firstImage.src = imageUrls[0];
firstImage.onload = function() {
    changeBackground();
    setInterval(changeBackground, 4000);
};