// === Toggle Menu ===
document.getElementById("menuToggle").addEventListener("click", function () {
  const nav = document.querySelector("nav");
  nav.classList.toggle("active");
  this.textContent = nav.classList.contains("active") ? "\u2716" : "\u2630";
});

// === Validasi Form ===
document.querySelector("form").addEventListener("submit", function (e) {
  e.preventDefault();

  const nama = document.getElementById("txtNama");
  const email = document.getElementById("txtEmail");
  const pesan = document.getElementById("txtPesan");

  // Hapus error lama
  document.querySelectorAll(".error-msg").forEach(el => el.remove());
  [nama, email, pesan].forEach(el => el.style.border = "");

  let isValid = true;
  let messages = [];

  // Cek nama
  if (nama.value.trim().length < 3) {
    showError(nama, "Nama minimal 3 huruf dan tidak boleh kosong.");
    
    isValid = false;
  } else if (!/^[A-Za-z\s]+$/.test(nama.value)) {
    showError(nama, "Nama hanya boleh berisi huruf dan spasi.");
    
    isValid = false;
  }

  // Cek email
  if (email.value.trim() === "") {
    showError(email, "Email tidak boleh kosong.");

    isValid = false;
  } else if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email.value)) {
    showError(email, "Format email tidak valid. Contoh: nama@gmail.com");
    
    isValid = false;
  }

  // Cek pesan
  if (pesan.value.trim().length < 10) {
    showError(pesan, "Pesan minimal 10 karakter agar lebih jelas.");
    
    isValid = false;
  }

  // Tampilkan hasil
  if (!isValid) {
    e.preventDefault();
  } else {
    alert("Terima kasih, " + nama.value + "!\nPesan Anda telah dikirim.");
    this.reset();
    document.getElementById("charCount").textContent = "0/200 karakter";
  }
});

// === Fungsi untuk tampilkan error merah ===
function showError(inputElement, message) {
  const small = document.createElement("small");
  small.className = "error-msg";
  small.textContent = message;
  
  small.style.color = "red";
  small.style.fontSize = "14px";
  small.style.display = "block";
  small.style.marginTop = "4px";

  // Masukkan di bawah input langsung
  inputElement.insertAdjacentElement("afterend", small);
  inputElement.style.border = "1px solid red";
}

// === Hitung karakter pesan ===
document.getElementById("txtPesan").addEventListener("input", function () {
  const panjang = this.value.length;
  document.getElementById("charCount").textContent = panjang + "/200 karakter";
});

function alignErrorMessage(smallEl, inputEl) {
const isMobile = window.matchMedia("(max-width: 600px)").matches;
if (isMobile) {
smallEl.style.marginLeft = "0";
smallEl.style.width = "100%";
return;
}
const label = inputEl.closest("label");
if (!label) return;
const rectLabel = label.getBoundingClientRect();
const rectInput = inputEl.getBoundingClientRect();
const offsetLeft = Math.max(0, Math.round(rectInput.left - rectLabel.left));
smallEl.style.marginLeft = offsetLeft + "px";
smallEl.style.width = Math.round(rectInput.width) + "px";
}
window.addEventListener("resize", () => {
document.querySelectorAll(".error-msg").forEach(small => {
const target = document.getElementById(small.dataset.forId);
if (target) alignErrorMessage(small, target);
});
});

// === Halo dunia ===
alert("Halo dunia");
alert("Halo Dunia dari file eksternal!");
let namaUser = prompt("Siapa nama kamu?");
alert("Halo, " + namaUser + "!");

// === Tambah teks di home ===
document.addEventListener("DOMContentLoaded", function () {
  const homeSection = document.getElementById("home");
  if (homeSection) {
    const ucapan = document.createElement("p");
    ucapan.textContent = "Halo! Selamat datang di halaman saya!";
    homeSection.appendChild(ucapan);
  }
});