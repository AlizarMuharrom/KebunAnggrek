var inputTanggal = document.getElementById('tanggal');

function isiNilaiTanggal() {
    var sekarang = new Date();
    var tanggal = sekarang.toLocaleDateString();

    var nilaiInput = tanggal + ' ';

    inputTanggal.value = nilaiInput;
}

window.onload = function() {
    isiNilaiTanggal();
};



function getNextID() {
 // Buat objek XMLHttpRequest
var xhttp = new XMLHttpRequest();

// Tentukan tindakan yang diambil ketika permintaan selesai
xhttp.onreadystatechange = function() {
  if (this.readyState == 4 && this.status == 200) {
    // Tangani respon dari server di sini
    var maxID = parseInt(this.responseText) + 1;
    document.getElementById('idpenjualan').value = maxID;
  }
};

// Buka koneksi ke server
xhttp.open("GET", "koneksi.php", true);
xhttp.send();
  
  
}




