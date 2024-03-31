AOS.init();

function validateNumericInput(inputField) {
  // Remove non-numeric characters using a regular expression
  inputField.value = inputField.value.replace(/[^0-9]/g, '');
}

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
  setInterval(changeBackground, 5000);
};


